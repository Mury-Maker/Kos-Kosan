<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Ganti 'users' jika nama tabel Anda berbeda
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique(); // Email sebagai login
            $table->string('password');

            // Kolom Tambahan
            $table->enum('role', ['admin', 'pemilik'])->default('pemilik');

            // Foreign Key ke tabel_pemilik, diizinkan NULL untuk akun Admin
            $table->foreignId('id_pemilik')
                  ->nullable()
                  ->constrained('tabel_pemilik', 'id_pemilik')
                  ->onDelete('cascade');

            $table->enum('status_akun', ['active', 'inactive'])->default('active'); // Admin input, langsung aktif

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
