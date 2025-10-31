<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kos;
use App\Models\Fasilitas;

class OwnerFasilitasController extends Controller
{
    /**
     * Menampilkan daftar fasilitas yang dikelompokkan per Kos milik owner.
     */
    public function indexFasilitas()
    {
        $ownerId = Auth::user()->id_pemilik; // Ambil ID Pemilik dari tabel users

        // Ambil SEMUA Kos milik owner dan EAGER LOAD relasi fasilitasnya
        $kos = Kos::with('fasilitas')
            ->where('id_pemilik', $ownerId)
            ->get();

        // Mengirimkan data KOS ke view DENGAN NAMA VARIABEL $kos
        return view('owner.kelolaFasilitas', compact('kos'));
    }

    /**
     * Menampilkan form untuk edit fasilitas kos tertentu.
     * Owner harus memilih Kos mana yang akan diedit fasilitasnya.
     */
    public function formFasilitas(Kos $kos)
    {
        // 1. Verifikasi kepemilikan
        if ((int) $kos->id_pemilik !== (int) Auth::user()->id_pemilik) {
            // Memastikan perbandingan tipe data int
            abort(403, 'Anda tidak memiliki akses ke kos ini.');
        }

        // 2. Load data yang dibutuhkan form (Hanya Fasilitas)
        $kos->load(['fasilitas']);

        // 3. Siapkan data fasilitas untuk View
        $fasilitasMaster = Fasilitas::all();
        $kos->fasilitas_terpilih = $kos->fasilitas->pluck('id_fasilitas')->toArray();

        // Catatan: Variabel harga_kamar dan hargaKamar telah DIHILANGKAN.

        // Mengirim ke form khusus fasilitas
        return view('owner.form.formKelolaFasilitasO', compact('kos', 'fasilitasMaster'));
    }


public function updateFasilitas(Request $request, Kos $kos)
    {
        // 1. Verifikasi kepemilikan
        if ((int) $kos->id_pemilik !== (int) Auth::user()->id_pemilik) {
            abort(403, 'Anda tidak memiliki akses ke kos ini.');
        }

        // 2. Validasi (hanya fasilitas_ids)
        $request->validate([
            'fasilitas_ids' => 'nullable|array',
            'fasilitas_ids.*' => 'exists:tabel_fasilitas,id_fasilitas'
        ]);

        // 3. Logika Sync
        try {
            $kos->fasilitas()->sync($request->fasilitas_ids ?? []);

            return redirect()->route('owner.kelolaFasilitas')->with('success', 'Fasilitas Kos ' . $kos->nama_kos . ' berhasil diperbarui.');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memperbarui fasilitas: ' . $e->getMessage());
        }
    }
}
