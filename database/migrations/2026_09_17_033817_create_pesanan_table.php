<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('layanan_id')->constrained('layanan')->cascadeOnDelete();
            $table->foreignId('profil_ukuran_id')->nullable()->constrained('profilukuran')->nullOnDelete();
            $table->string('status')->default('pending');
            $table->decimal('total', 12, 2);
            $table->string('metode_pengiriman')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->timestamp('waktu')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};