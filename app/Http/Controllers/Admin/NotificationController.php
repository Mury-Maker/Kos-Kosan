<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuditLog; // Pastikan Anda meng-import model AuditLog

class NotificationController extends Controller
{
    /**
     * Menampilkan halaman daftar notifikasi.
     */
    public function index()
    {
        // Ambil semua log, urutkan dari yang terbaru, dan sertakan relasi 'user'
        // Kita paginasi agar tidak berat
        $notifikasi = AuditLog::with('user')
                            ->latest()
                            ->paginate(20);

        return view('admin.notifikasi', compact('notifikasi'));
    }

    /**
     * Menandai semua notifikasi sebagai telah dibaca.
     */
    public function markAllAsRead()
    {
        // Update semua notifikasi yang belum dibaca
        AuditLog::where('is_read', false)->update(['is_read' => true]);

        return back()->with('success', 'Semua notifikasi telah ditandai sebagai dibaca.');
    }
}
