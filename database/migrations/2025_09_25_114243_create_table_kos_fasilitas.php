<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tabel_kos_fasilitas', function (Blueprint $table) {
            $table->id('id_kos_fasilitas'); // Primary Key

            $table->foreignId('id_kos')->constrained('tabel_kos', 'id_kos')->onDelete('cascade');
            $table->foreignId('id_fasilitas')->constrained('tabel_fasilitas', 'id_fasilitas')->onDelete('cascade');

            $table->unique(['id_kos', 'id_fasilitas']); // Tidak ada duplikasi entri
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tabel_kos_fasilitas');
    }
};
