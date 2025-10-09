<?php

namespace Database\Seeders; // Ini harus sesuai dengan lokasi file

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerUserSeeder extends Seeder
{
    /**
     * Jalankan database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Tambahkan data ke tabel_pemilik
        $pemilikId = DB::table('tabel_pemilik')->insertGetId([
            'nama_pemilik' => 'Budi Setiawan',
            'nomor_telepon' => '081234567890',
            'alamat_pemilik' => 'Jl. Merdeka No. 10, Jakarta',
            'tanggal_daftar' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Tambahkan user dengan role 'owner'
        $ownerEmail = 'budi.owner@example.com';

        if (DB::table('users')->where('email', $ownerEmail)->doesntExist()) {
            DB::table('users')->insert([
                'email' => $ownerEmail,
                'password' => Hash::make('owner123'),
                'role' => 'owner',
                'id_pemilik' => $pemilikId,
                'status_akun' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
