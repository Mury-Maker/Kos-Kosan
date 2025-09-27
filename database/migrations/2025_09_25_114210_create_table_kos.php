<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tabel_kos', function (Blueprint $table) {
            $table->id('id_kos'); // Primary Key
            $table->string('nama_kos', 150);

            // Foreign Key ke tabel_pemilik
            $table->foreignId('id_pemilik')->constrained('tabel_pemilik', 'id_pemilik')->onDelete('cascade');

            $table->enum('tipe_kos', ['putra', 'putri', 'campuran']);
            $table->string('alamat_lengkap', 255);
            $table->text('deskripsi_kos')->nullable();

            // Kolom untuk Geocoding
            $table->double('lintang', 10, 7)->nullable();
            $table->double('bujur', 10, 7)->nullable();

            $table->integer('jumlah_kamar_total');
            $table->integer('jumlah_kamar_tersedia');

            // Kolom untuk penghitungan penghuni minimalis (Headcount)
            $table->integer('jumlah_penghuni_saat_ini')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tabel_kos');
    }
};
