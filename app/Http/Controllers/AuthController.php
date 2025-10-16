<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login.
     * Mengarahkan pengguna yang sudah login ke dashboard yang sesuai.
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Mengarahkan berdasarkan role jika sudah login
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->role === 'pemilik') {
                return redirect()->intended('/owner/dashboard');
            }
        }
        // Jika belum login, tampilkan form
        return view('auth.login');
    }

    /**
     * Menangani proses login.
     */
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

        // 2. Proses Autentikasi
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek Status Akun: Harus 'active'
            if ($user->status_akun !== 'active') {
                Auth::logout();
                throw ValidationException::withMessages([
                    'email' => ['Akun Anda berstatus tidak aktif. Silakan hubungi Admin Kelurahan.'],
                ]);
            }

            // Arahkan sesuai Role
            $request->session()->regenerate();

            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->role === 'pemilik') {
                return redirect()->intended('/owner/dashboard');
            } else {
                // Peran tidak dikenal (fallback safety)
                Auth::logout();
                throw ValidationException::withMessages([
                    'email' => ['Peran pengguna tidak dikenali.'],
                ]);
            }
        }

        // 3. Jika gagal login (kredensial salah)
        throw ValidationException::withMessages([
            'email' => ['Kredensial yang diberikan tidak cocok dengan data kami.'],
        ]);
    }

    /**
     * Proses logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
