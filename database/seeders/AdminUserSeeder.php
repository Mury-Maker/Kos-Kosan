<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Jalankan database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pastikan akun Admin belum ada
        if (DB::table('users')->where('email', 'admin.sukorame@kelurahan.go.id')->doesntExist()) {
            DB::table('users')->insert([
                'email' => 'admin.sukorame@kelurahan.go.id', // Email Admin untuk login
                'password' => Hash::make('admin123'), // Kata sandi default
                'role' => 'admin', // Peran diset sebagai 'admin'
                'id_pemilik' => null, // Harus NULL karena Admin tidak terhubung ke tabel_pemilik
                'status_akun' => 'active', // Akun langsung aktif
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
