<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kos;
use App\Models\Fasilitas;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Gambar;
use App\Models\Pemilik;
use App\Models\AuditLog;

class OwnerKosController extends Controller
{
    // Helper untuk mendapatkan ID kos milik owner yang sedang login
    private function getOwnerKosQuery()
    {
        $pemilikId = Auth::user()->id_pemilik;
        if (!$pemilikId) {
            return Kos::whereRaw('1 = 0');
        }
        return Kos::where('id_pemilik', $pemilikId);
    }

    // --- TAMPILAN & READ ---

    public function indexKos()
    {
        $kos = $this->getOwnerKosQuery()->with('hargaKamar')->get();
        return view('owner.kelolaKos', compact('kos'));
    }

    public function formKos(Kos $kos = null)
    {
        if ($kos && $kos->id_pemilik !== Auth::user()->id_pemilik) {
            abort(403, 'Akses ditolak ke data kos ini.');
        }

        if (!$kos || !$kos->exists) {
            $kos = new Kos();
        }

        $fasilitas = Fasilitas::all();
        $kos->fasilitas_terpilih = $kos->exists ? $kos->fasilitas->pluck('id_fasilitas')->toArray() : [];
        $kos->harga_kamar = $kos->hargaKamar->first() ?? (object)['harga_terendah' => null, 'harga_tertinggi' => null];

        return view('owner.form.formKelolaKosO', compact('kos', 'fasilitas'));
    }

    // --- CREATE & UPDATE ---

    public function storeKos(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_kos' => 'required|string|max:150',
            'tipe_kos' => ['required', Rule::in(['putra', 'putri', 'campuran'])],
            'alamat_lengkap' => 'required|string|max:255',
            'jumlah_kamar_total' => 'required|integer|min:1',
            'jumlah_kamar_tersedia' => 'required|integer|lte:jumlah_kamar_total',
            'harga_terendah' => 'required|numeric|min:0',
            'harga_tertinggi' => 'required|numeric|gte:harga_terendah',
        ]);

        DB::beginTransaction();
        try {
            $data = $validated;
            $data['id_pemilik'] = Auth::user()->id_pemilik;

            $kos = Kos::create($data);

            $kos->hargaKamar()->create([
                'harga_terendah' => $request->harga_terendah,
                'harga_tertinggi' => $request->harga_tertinggi,
            ]);

            //$kos->fasilitas()->sync($request->fasilitas_ids ?? []);

            DB::commit();
            return redirect()->route('owner.kelolaKos')->with('success', 'Data Kos berhasil ditambahkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal menambahkan data Kos: '.$e->getMessage());
        }
    }

    public function updateKos(Request $request, Kos $kos)
    {
        if ($kos->id_pemilik !== Auth::user()->id_pemilik) {
            abort(403, 'Akses ditolak.');
        }



        $validated = $request->validate([
            'nama_kos' => 'required|string|max:150',
            'tipe_kos' => ['required', Rule::in(['putra', 'putri', 'campuran'])],
            'alamat_lengkap' => 'required|string|max:255',
            'jumlah_kamar_total' => 'required|integer|min:1',
            'jumlah_kamar_tersedia' => 'required|integer|lte:jumlah_kamar_total',
            'harga_terendah' => 'required|numeric|min:0',
            'harga_tertinggi' => 'required|numeric|gte:harga_terendah',
        ]);

        DB::beginTransaction();
        try {
            $kos->update($validated);

            $kos->hargaKamar()->updateOrCreate(
                ['id_kos' => $kos->id_kos],
                ['harga_terendah' => $request->harga_terendah, 'harga_tertinggi' => $request->harga_tertinggi]
            );

            //$kos->fasilitas()->sync($request->fasilitas_ids ?? []);

            DB::commit();
            return redirect()->route('owner.kelolaKos')->with('success', 'Data Kos berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal memperbarui data Kos: '.$e->getMessage());
        }
    }

    /**
     * Menghapus data Kos.
     */
    public function destroyKos(Kos $kos)
    {
        if ($kos->id_pemilik !== Auth::user()->id_pemilik) {
            abort(403, 'Akses ditolak.');
        }
        $kos->delete();
        return redirect()->route('owner.kelolaKos')->with('success', 'Data Kos berhasil dihapus.');
    }

    public function dashboard()
    {
        $allKos = $this->getOwnerKosQuery()->with(['pemilik', 'hargaKamar', 'fasilitas'])->get();

        $totalKamar = $allKos->sum('jumlah_kamar_total');
        $kamarTersedia = $allKos->sum('jumlah_kamar_tersedia');
        $kamarTerpakai = $totalKamar - $kamarTersedia;
        $totalPenghuni = $allKos->sum('jumlah_penghuni_saat_ini');

        // Asumsi: log milik user ini yang belum dibaca
        $pembaruan = \App\Models\AuditLog::where('user_id', Auth::id())
                            ->where('is_read', false)
                            ->count();

        $stats = [
            'totalKos' => $allKos->count(),
            'totalKamar' => $totalKamar,
            'kamarTerpakai' => $kamarTerpakai,
            'kamarTersedia' => $kamarTersedia,
            'totalPenghuni' => $totalPenghuni,
            'pembaruan' => $pembaruan,
        ];

        // $kosList digunakan untuk 2 tabel di bawah
        $kosList = $allKos;

        return view('owner.dashboard', compact('stats', 'kosList'));
    }
}
