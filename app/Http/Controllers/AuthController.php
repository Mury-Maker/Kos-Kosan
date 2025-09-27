<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        // Jika pengguna sudah login, arahkan ke dashboard
        if (Auth::check()) {
            return redirect('/admin/dashboard');
        }
        return view('auth.login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        // 1. Validasi Input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Kolom kata sandi wajib diisi.',
        ]);

        // 2. Coba Proses Autentikasi
        // Cek kredensial dan status akun
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek Status Akun (dari rancangan tabel kita)
            if ($user->status_akun !== 'active') {
                Auth::logout();
                throw ValidationException::withMessages([
                    'email' => ['Akun Anda berstatus tidak aktif. Silakan hubungi Admin Kelurahan.'],
                ]);
            }

            // Cek Role (hanya Admin/Pemilik yang boleh login ke dashboard)
            if ($user->role == 'admin' || $user->role == 'pemilik') {
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
            }
        }

        // 3. Jika Autentikasi Gagal
        throw ValidationException::withMessages([
            'email' => ['Kredensial yang diberikan tidak cocok dengan data kami.'],
        ]);
    }

    // Menangani proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
