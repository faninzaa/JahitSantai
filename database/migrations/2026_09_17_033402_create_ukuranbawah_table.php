<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ukuranbawah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_ukuran_id')->constrained('profilukuran')->cascadeOnDelete();
            $table->decimal('lingkar_panggul1', 6, 2)->nullable();
            $table->decimal('lingkar_panggul2', 6, 2)->nullable();
            $table->decimal('panjang_rok', 6, 2)->nullable();
            $table->decimal('ban', 6, 2)->nullable();
            $table->decimal('panggul1', 6, 2)->nullable();
            $table->decimal('panggul2', 6, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ukuranbawah');
    }
};