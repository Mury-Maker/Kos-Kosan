<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kos;
use App\Models\AuditLog; // Menggunakan model ini untuk menghitung 'Pembaruan'
use Illuminate\Support\Facades\DB; // Diperlukan untuk raw query COUNT/GROUP BY

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil data untuk Peta (markers) dan Tabel Ringkasan
        $kos = Kos::with('pemilik')->get();

        $markers = $kos->filter(fn($k) => $k->lintang && $k->bujur)
                       ->map(fn($kos) => [
                           'lat' => (float) $kos->lintang,
                           'lng' => (float) $kos->bujur,
                           'title' => $kos->nama_kos,
                           'tipe' => $kos->tipe_kos,
                       ])->toJson();

        // 2. Hitung Statistik untuk Card
        $kos_counts = $kos->groupBy('tipe_kos')->map->count();

        $stats = [
            'totalKos'       => $kos->count(),
            'kosPutra'       => $kos_counts->get('putra', 0),
            'kosPutri'       => $kos_counts->get('putri', 0),
            'kosCampur'      => $kos_counts->get('campuran', 0),
            // Asumsi Card Pembaruan menampilkan jumlah log yang belum dibaca
            'pembaruan_count' => AuditLog::where('is_read', false)->count(),
        ];

        // 3. Ambil 5 data kos terbaru untuk tabel ringkasan
        $kos_terbaru = Kos::with('pemilik')->latest()->take(5)->get();

        return view('admin.dashboard', [
            'kos_terbaru' => $kos_terbaru, // Untuk tabel ringkasan
            'markers'     => $markers,
            'stats'       => $stats,     // Mengirim semua data card
        ]);
    }
}
