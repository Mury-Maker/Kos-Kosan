<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kos;
use App\Models\Pemilik;
use App\Models\Fasilitas;
use App\Models\HargaKamar;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class KosController extends Controller
{
    // --- KELOLA DATA KOS (tabel_kos) ---

    public function indexKos()
    {
        $kos = Kos::with('pemilik')->get();
        return view('admin.kelolaDataKos', compact('kos'));
    }

    public function formKos(?Kos $kos = null)
    {
        // FINAL FIX UNTUK UNDEFINED VARIABLE $kos DI BLADE
        // Inisialisasi $kos harus terjadi di sini (Controller) sebelum di-compact
        if (!$kos || !$kos->exists) {
            $kos = new \App\Models\Kos();
        }

        // ... (Sisa logika Controller: ambil $pemilik, $fasilitas, dan set properti tambahan)
        $pemilik = \App\Models\Pemilik::has('user')->get();
        $fasilitas = \App\Models\Fasilitas::all();

        // Inisialisasi properti untuk View
        $kos->fasilitas_terpilih = $kos->exists ? $kos->fasilitas->pluck('id_fasilitas')->toArray() : [];
        $kos->harga_kamar = $kos->exists ? $kos->hargaKamar->first() : (object)['harga_terendah' => null, 'harga_tertinggi' => null];

        return view('admin.form.formKelolaDataKos', compact('kos', 'pemilik', 'fasilitas'));
    }


    public function storeKos(Request $request)
    {
        $validated = $request->validate([
            'id_pemilik' => 'required|exists:tabel_pemilik,id_pemilik',
            'nama_kos' => 'required|string|max:150',
            'tipe_kos' => ['required', Rule::in(['putra', 'putri', 'bebas'])],
            'alamat_lengkap' => 'required|string|max:255',
            'deskripsi_kos' => 'nullable|string',
            'jumlah_kamar_total' => 'required|integer|min:1',
            'jumlah_kamar_tersedia' => 'required|integer|lte:jumlah_kamar_total',
            'jumlah_penghuni_saat_ini' => 'required|integer|min:0',
            'lintang' => 'nullable|numeric',
            'bujur' => 'nullable|numeric',

            'harga_terendah' => 'required|numeric|min:0',
            'harga_tertinggi' => 'required|numeric|gte:harga_terendah',

            'fasilitas_ids' => 'nullable|array',
            'fasilitas_ids.*' => 'exists:tabel_fasilitas,id_fasilitas',
        ], [
            'lte' => 'Kamar tersedia tidak boleh melebihi total kamar.',
        ]);

        DB::beginTransaction();
        try {
            $kos = Kos::create($validated);

            $kos->hargaKamar()->create([
                'harga_terendah' => $request->harga_terendah,
                'harga_tertinggi' => $request->harga_tertinggi,
            ]);

            if ($request->has('fasilitas_ids')) {
                $kos->fasilitas()->sync($request->fasilitas_ids);
            }

            DB::commit();
            return redirect()->route('admin.kelola_kos')->with('success', 'Data Kos berhasil ditambahkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal menambahkan data Kos. '.$e->getMessage());
        }
    }

    /**
     * Menangani pembaruan data Kos.
     */
    public function updateKos(Request $request, Kos $kos)
    {
        $validated = $request->validate([
            'id_pemilik' => 'required|exists:tabel_pemilik,id_pemilik',
            'nama_kos' => 'required|string|max:150',
            'tipe_kos' => ['required', Rule::in(['putra', 'putri', 'bebas'])],
            'alamat_lengkap' => 'required|string|max:255',
            'deskripsi_kos' => 'nullable|string',
            'jumlah_kamar_total' => 'required|integer|min:1',
            'jumlah_kamar_tersedia' => 'required|integer|lte:jumlah_kamar_total',
            'jumlah_penghuni_saat_ini' => 'required|integer|min:0',
            'lintang' => 'nullable|numeric',
            'bujur' => 'nullable|numeric',

            'harga_terendah' => 'required|numeric|min:0',
            'harga_tertinggi' => 'required|numeric|gte:harga_terendah',

            'fasilitas_ids' => 'nullable|array',
            'fasilitas_ids.*' => 'exists:tabel_fasilitas,id_fasilitas',
        ], [
            'lte' => 'Kamar tersedia tidak boleh melebihi total kamar.',
        ]);

        DB::beginTransaction();
        try {
            // 1. Update data Kos utama
            $kos->update($validated);

            // 2. Update atau buat baru data Harga Kamar (menggunakan updateOrCreate)
            $kos->hargaKamar()->updateOrCreate(
                ['id_kos' => $kos->id_kos], // Kondisi pencarian
                [
                    'harga_terendah' => $request->harga_terendah,
                    'harga_tertinggi' => $request->harga_tertinggi,
                ]
            );

            // 3. Sync Fasilitas (Many-to-Many)
            $kos->fasilitas()->sync($request->fasilitas_ids ?? []);

            DB::commit();
            return redirect()->route('admin.kelola_kos')->with('success', 'Data Kos berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal memperbarui data Kos. '.$e->getMessage());
        }
    }

    /**
     * Menghapus data Kos.
     */
    public function destroyKos(Kos $kos)
    {
        $kos->delete(); // Karena onDelete('cascade') sudah diatur di migrasi, relasi akan ikut terhapus.
        return redirect()->route('admin.kelola_kos')->with('success', 'Data Kos berhasil dihapus.');
    }


    // --- KELOLA FASILITAS (tabel_fasilitas) ---

    public function indexFasilitas()
    {
        $fasilitas = Fasilitas::all();
        return view('admin.kelolaFasilitas', compact('fasilitas'));
    }

    public function formFasilitas(Fasilitas $fasilitas = null)
    {
        return view('admin.form.formKelolaFasilitas', compact('fasilitas'));
    }

    public function storeFasilitas(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:100|unique:tabel_fasilitas,nama_fasilitas',
        ]);

        Fasilitas::create($request->all());
        return redirect()->route('admin.kelola_fasilitas')->with('success', 'Fasilitas baru berhasil ditambahkan.');
    }

    public function updateFasilitas(Request $request, Fasilitas $fasilitas)
    {
        $request->validate([
            'nama_fasilitas' => ['required', 'string', 'max:100', Rule::unique('tabel_fasilitas', 'nama_fasilitas')->ignore($fasilitas->id_fasilitas, 'id_fasilitas')],
        ]);

        $fasilitas->update($request->all());
        return redirect()->route('admin.kelola_fasilitas')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroyFasilitas(Fasilitas $fasilitas)
    {
        $fasilitas->delete();
        return redirect()->route('admin.kelola_fasilitas')->with('success', 'Fasilitas berhasil dihapus.');
    }
}
