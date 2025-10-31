<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tabel_pemilik', function (Blueprint $table) {
            $table->id('id_pemilik'); // Primary Key
            $table->string('nama_pemilik', 150);
            $table->string('nomor_telepon', 15);
            $table->string('alamat_pemilik', 255)->nullable();
            $table->string('foto_profil', 255)->nullable();
            $table->timestamp('tanggal_daftar')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tabel_pemilik');
    }
};
