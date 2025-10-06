<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tabel_gambar', function (Blueprint $table) {
            $table->id('id_gambar'); // Primary Key

            $table->foreignId('id_kos')->constrained('tabel_kos', 'id_kos')->onDelete('cascade');

            $table->string('url_gambar'); // Lokasi atau URL gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tabel_gambar');
    }
};
