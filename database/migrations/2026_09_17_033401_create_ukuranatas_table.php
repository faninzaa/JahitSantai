<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ukuranatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_ukuran_id')->constrained('profilukuran')->cascadeOnDelete();
            $table->decimal('lingkar_badan', 6, 2)->nullable();
            $table->decimal('lingkar_dada', 6, 2)->nullable();
            $table->decimal('lebar_dada', 6, 2)->nullable();
            $table->decimal('lebar_punggung', 6, 2)->nullable();
            $table->decimal('lebar_bahu', 6, 2)->nullable();
            $table->decimal('panjang_punggung', 6, 2)->nullable();
            $table->decimal('panjang_baju', 6, 2)->nullable();
            $table->decimal('panjang_lengan', 6, 2)->nullable();
            $table->decimal('lingkar_lengan', 6, 2)->nullable();
            $table->decimal('panjang_siku', 6, 2)->nullable();
            $table->decimal('lingkar_siku', 6, 2)->nullable();
            $table->decimal('lingkar_pinggang', 6, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ukuranatas');
    }
};