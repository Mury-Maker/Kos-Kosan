<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tabel_fasilitas', function (Blueprint $table) {
            $table->id('id_fasilitas'); // Primary Key
            $table->string('nama_fasilitas', 100)->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tabel_fasilitas');
    }
};
