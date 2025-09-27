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
        Schema::create('tabel_audit_log', function (Blueprint $table) {
            $table->id();

            // Siapa yang melakukan aksi (Pemilik)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Apa yang diubah
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');

            $table->enum('action', ['created', 'updated', 'deleted']);

            // Detail perubahan (Opsional, dapat disederhanakan)
            $table->json('old_data')->nullable();
            $table->json('new_data')->nullable();

            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_audit_log');
    }
};
