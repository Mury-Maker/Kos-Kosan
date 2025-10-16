<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Menampilkan daftar semua kos aktif untuk halaman daftarKos.
     */
    public function daftarKos(Request $request)
    {
        // Ambil semua kos yang terdaftar, diurutkan berdasarkan yang terbaru
        // Note: Asumsi semua kos yang ada di database adalah 'Aktif'
        $query = Kos::query()
                    ->with(['hargaKamar', 'gambar']);

        // --- Logika Filtering dan Searching ---
        $search = $request->query('search');
        $tipe = $request->query('tipe');

        if ($search) {
            $query->where('nama_kos', 'like', '%' . $search . '%');
        }

        if ($tipe && in_array($tipe, ['putra', 'putri', 'campuran'])) {
            $query->where('tipe_kos', $tipe);
        }
        // --- End Filtering ---

        // Ambil data dan terapkan pagination
        $listKos = $query->paginate(12);

        return view('guest.daftarKos', compact('listKos'));
    }

    // Tambahkan method lain untuk landingPage, tentang, dll. jika diperlukan
}
