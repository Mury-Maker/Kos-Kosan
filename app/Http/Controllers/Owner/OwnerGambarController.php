<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Kos;
use App\Models\Gambar;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class OwnerGambarController extends Controller
{
    /**
     * Menampilkan daftar Kos milik Owner (untuk dipilih dan dikelola gambarnya).
     */
    public function indexGambar()
    {
        $ownerId = Auth::user()->id_pemilik;

        // Ambil SEMUA Kos milik owner, Eager load gambar dan hitung jumlah gambar
        $kos = Kos::withCount('gambar')
                  ->where('id_pemilik', $ownerId)
                  ->get();

        return view('owner.kelolaGambar', compact('kos'));
    }

    /**
     * Menampilkan form untuk tambah/hapus gambar Kos spesifik.
     * Menggunakan Route Model Binding: Kos $kos.
     */
    public function formGambar(Request $request)
    {
        $kosId = $request->query('kos');

        // Temukan Kos
        $kos = Kos::findOrFail($kosId); // Ini memicu 404 jika ID tidak valid

        // Verifikasi kepemilikan (Logika keamanan tetap utuh)
        if ((int) $kos->id_pemilik !== (int) Auth::user()->id_pemilik) {
            abort(403, 'Anda tidak memiliki akses ke kos ini.');
        }

        // Eager load semua gambar untuk kos ini
        $gambarList = $kos->gambar()->latest()->get();

        return view('owner.form.formKelolaGambarO', compact('kos', 'gambarList'));
    }

    /**
     * Menyimpan gambar baru. (Menerima id_kos via hidden field).
     */
    public function storeGambar(Request $request)
    {
        $request->validate([
            'id_kos' => 'required|integer|exists:tabel_kos,id_kos',
            'gambar_baru' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $ownerId = Auth::user()->id_pemilik;

        // 1. Verifikasi kepemilikan (Memastikan Kos tersebut milik Owner yang login)
        $kos = Kos::where('id_kos', $request->id_kos)
                  ->where('id_pemilik', $ownerId)
                  ->firstOrFail(); // Jika Kos tidak ditemukan/bukan milik Owner, throw 404

        // 2. Upload file dan simpan path
        $path = $request->file('gambar_baru')->store('kos_images', 'public');

        Gambar::create([
            'id_kos' => $kos->id_kos,
            'url_gambar' => $path,
        ]);

        // Arahkan kembali ke form edit gambar kos
        return redirect()->route('owner.form_gambar', ['kos' => $kos->id_kos])
                         ->with('success', 'Gambar berhasil ditambahkan.');
    }

    /**
     * Menghapus Gambar.
     * Menggunakan Route Model Binding: Gambar $gambar.
     */
    public function destroyGambar(Gambar $gambar)
    {
        // PENTING: Perlu Eager Load Kos di sini jika belum di-load oleh Route Model Binding
        // Kita asumsikan relasi $gambar->kos sudah di-load (melalui Model Gambar)

        // Cek kepemilikan (Pastikan kos yang terhubung ke gambar ini milik owner)
        if ((int) $gambar->kos->id_pemilik !== (int) Auth::user()->id_pemilik) {
            abort(403, 'Akses ditolak.');
        }

        // Hapus file dari storage
        Storage::disk('public')->delete($gambar->url_gambar);

        // Hapus record dari database
        $gambar->delete();

        return back()->with('success', 'Gambar berhasil dihapus.');
    }
}
