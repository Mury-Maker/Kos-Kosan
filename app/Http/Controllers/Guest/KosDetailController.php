<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Kos;
use Illuminate\Http\Request;

class KosDetailController extends Controller
{
    /**
     * Menampilkan halaman detail untuk satu kos.
     */
    public function show(Kos $kos)
    {
        // Muat semua relasi yang diperlukan di halaman detail
        $kos->load([
            'hargaKamar', // Untuk range harga
            'fasilitas',  // Untuk list fasilitas
            'gambar'      // Untuk galeri gambar
        ]);

        // Ambil data harga
        $hargaKamar = $kos->hargaKamar->first() ?? (object)['harga_terendah' => null, 'harga_tertinggi' => null];

        return view('guest.detailKos', compact('kos', 'hargaKamar'));
    }
}
