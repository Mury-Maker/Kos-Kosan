<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // --- KELOLA PEMILIK (Data Personal - Tabel tabel_pemilik) ---

    public function indexPemilik()
    {
        $pemilik = Pemilik::with('user')->get();
        return view('admin.kelolaPemilikKos', compact('pemilik'));
    }

    public function formPemilik(Pemilik $pemilik = null) // Digunakan untuk Tambah (null) atau Edit (model)
    {
        return view('admin.form.formKelolaPemilikKos', compact('pemilik'));
    }

    public function storePemilik(Request $request)
    {
        $request->validate([
            'nama_pemilik' => 'required|string|max:150',
            'alamat_pemilik' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15|unique:tabel_pemilik,nomor_telepon',
        ], [
            'nomor_telepon.unique' => 'Nomor telepon ini sudah terdaftar.',
            'required' => ':attribute wajib diisi.',
        ]);

        Pemilik::create($request->all());

        return redirect()->route('admin.kelola_pemilik_kos')
                         ->with('success', 'Data Pemilik berhasil ditambahkan. Silakan buat akun login untuk Pemilik ini.');
    }

    /**
     * Menangani pembaruan data Pemilik.
     */
    public function updatePemilik(Request $request, Pemilik $pemilik)
    {
        $request->validate([
            'nama_pemilik' => 'required|string|max:150',
            'alamat_pemilik' => 'required|string|max:255',
            // Pastikan unique diabaikan untuk Pemilik yang sedang diedit
            'nomor_telepon' => ['required', 'string', 'max:15', Rule::unique('tabel_pemilik', 'nomor_telepon')->ignore($pemilik->id_pemilik, 'id_pemilik')],
        ]);

        $pemilik->update($request->all());

        return redirect()->route('admin.kelola_pemilik_kos')
                         ->with('success', 'Data Pemilik berhasil diperbarui.');
    }

    /**
     * Menghapus data Pemilik.
     */
    public function destroyPemilik(Pemilik $pemilik)
    {
        $pemilik->delete(); // Jika ada user/kos yang terhubung, ini akan ikut terhapus karena onDelete('cascade')

        return redirect()->route('admin.kelola_pemilik_kos')
                         ->with('success', 'Data Pemilik berhasil dihapus.');
    }


    // --- KELOLA USER (Akun Login - Tabel users) ---

    public function indexUser()
    {
        $users = User::with('pemilik')->get();
        return view('admin.kelolaUser', compact('users'));
    }

    public function formUser(Request $request, User $user = null)
    {
        $idPemilikAwal = $request->query('id_pemilik');

        // --- PERBAIKAN INI ---
        // 1. Ambil Pemilik yang BELUM punya akun user (hanya untuk mode tambah)
        $pemilikTersedia = Pemilik::doesntHave('user')->get();

        // 2. Jika sedang mode EDIT, tambahkan Pemilik saat ini ke daftar agar bisa dipilih
        if ($user && $user->pemilik) {
            // Gabungkan pemilik yang sedang diedit ke daftar, agar dropdown tidak kosong
            $pemilikTersedia = $pemilikTersedia->prepend($user->pemilik);
        }
        // --- AKHIR PERBAIKAN ---

        return view('admin.form.formKelolaUser', compact('pemilikTersedia', 'idPemilikAwal', 'user'));
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => ['required', Rule::in(['admin', 'pemilik'])],

            // Validasi id_pemilik: wajib jika role=pemilik DAN harus unik (pemilik belum punya akun)
            'id_pemilik' => [
                Rule::requiredIf($request->role === 'pemilik'),
                'nullable',
                Rule::unique('users', 'id_pemilik')->where(function ($query) {
                    return $query->whereNotNull('id_pemilik');
                }),
            ],
        ], [
            'id_pemilik.required' => 'Pemilik wajib dipilih jika role adalah Pemilik Kos.',
            'id_pemilik.unique' => 'Pemilik yang dipilih sudah memiliki akun login.',
            'required' => ':attribute wajib diisi.',
            'min' => 'Kata sandi minimal 6 karakter.'
        ]);

        $role = $request->input('role');
        $idPemilik = ($role == 'pemilik') ? $request->id_pemilik : null;

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
            'id_pemilik' => $idPemilik,
            'status_akun' => 'active', // Karena Admin yang membuat
        ]);

        return redirect()->route('admin.kelola_user')->with('success', 'Akun User berhasil dibuat.');
    }

    /**
     * Menangani pembaruan data Akun User.
     */
    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            // Email diabaikan untuk user yang sedang diedit
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => 'nullable|string|min:6', // Password boleh kosong jika tidak diubah
            'role' => ['required', Rule::in(['admin', 'pemilik'])],
            'status_akun' => ['required', Rule::in(['active', 'inactive'])],
            // ... (validasi id_pemilik yang rumit diabaikan untuk edit, disesuaikan)
        ]);

        $userData = $request->except(['password', '_token', '_method']);

        // Hashing password hanya jika diisi
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        return redirect()->route('admin.kelola_user')
                         ->with('success', 'Data Akun User berhasil diperbarui.');
    }

    /**
     * Menghapus Akun User.
     */
    public function destroyUser(User $user)
    {
        // Data Pemilik (tabel_pemilik) TIDAK ikut terhapus, hanya akun loginnya
        $user->delete();

        return redirect()->route('admin.kelola_user')
                         ->with('success', 'Akun User berhasil dihapus.');
    }
}
