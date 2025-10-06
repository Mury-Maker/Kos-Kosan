<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel diubah namanya menjadi tabel_harga_kamar
        Schema::create('tabel_harga_kamar', function (Blueprint $table) {
            $table->id('id_harga_kamar'); // Tetap menggunakan ID ini untuk menjaga FK

            // Foreign Key ke tabel_kos
            $table->foreignId('id_kos')->constrained('tabel_kos', 'id_kos')->onDelete('cascade');

            // Atribut Harga
            $table->decimal('harga_terendah', 10, 0);
            $table->decimal('harga_tertinggi', 10, 0);

            // Kolom 'kapasitas_kamar' DIHAPUS

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_harga_kamar');
    }
};
