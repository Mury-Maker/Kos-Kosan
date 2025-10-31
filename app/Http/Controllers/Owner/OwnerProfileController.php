<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Pemilik; // Model Pemilik
use App\Models\User;   // Model User

class OwnerProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pemilik kos yang sedang login.
     */
    public function showProfile()
    {
        $user = Auth::user();

        // Memastikan user memiliki role 'pemilik' dan terhubung ke data Pemilik
        if ($user->role !== 'pemilik' || !$user->pemilik) {
            return redirect()->route('owner.dashboard')->with('error', 'Akses ditolak atau data pemilik tidak ditemukan.');
        }

        $pemilikData = $user->pemilik; // Data dari tabel_pemilik
        $userData = $user;             // Data dari tabel users

        return view('owner.profile', compact('pemilikData', 'userData'));
    }

    /**
     * Menampilkan form untuk mengedit data pribadi Pemilik.
     */
    public function showEditProfile(Pemilik $pemilik)
    {
        // Pastikan pemilik yang diedit adalah pemilik yang sedang login
        if (Auth::id() !== $pemilik->user->id) {
            abort(403, 'Akses tidak diizinkan.');
        }

        // Menggunakan $pemilik sebagai $pemilikData di view agar konsisten
        $pemilikData = $pemilik;

        return view('owner.form.formKelolaProfil', compact('pemilikData'));
    }

    /**
     * Menyimpan pembaruan data pribadi Pemilik (tabel_pemilik).
     */
    public function updateProfile(Request $request, Pemilik $pemilik)
    {
        if (Auth::id() !== $pemilik->user->id) {
            abort(403, 'Akses tidak diizinkan.');
        }

        $request->validate([
            'nama_pemilik' => 'required|string|max:150',
            'alamat_pemilik' => 'required|string|max:255',
            'nomor_telepon' => ['required', 'string', 'max:15', Rule::unique('tabel_pemilik', 'nomor_telepon')->ignore($pemilik->id_pemilik, 'id_pemilik')],
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except(['foto_profil']);

        // --- LOGIKA UPLOAD FOTO PROFIL ---
        if ($request->hasFile('foto_profil')) {
            // 1. Hapus foto lama jika ada
            if ($pemilik->foto_profil) {
                Storage::disk('public')->delete($pemilik->foto_profil);
            }

            // 2. Simpan foto baru ke folder 'public/profiles'
            $path = $request->file('foto_profil')->store('profiles', 'public');
            $data['foto_profil'] = $path; // Simpan path ke database
        }
        // --- END LOGIKA UPLOAD ---

        $pemilik->update($data);

        return back()->with('success', 'Profil pribadi berhasil diperbarui.');
    }

    /**
     * Menampilkan form ganti kata sandi.
     */
    public function showChangePasswordForm()
    {
        if (Auth::user()->role !== 'pemilik') {
            abort(403, 'Akses ditolak.');
        }
        return view('owner.form.formGantiPw');
    }

    /**
     * Menangani pembaruan kata sandi (tabel users).
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = Auth::user();
        User::where('id', $user->id)->update(['password' => Hash::make($request->input('password'))]);

        return back()->with('success', 'Kata sandi berhasil diperbarui.');
    }
}
