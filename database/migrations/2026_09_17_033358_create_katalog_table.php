<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('layanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_layanan');
            $table->string('kategori'); // Permak, Jahit Baru, Custom Desain, Aksesoris
            $table->string('tipe_ukuran')->default('keduanya'); // atas, bawah, keduanya
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 12, 2);
            $table->string('estimasi_waktu')->nullable(); // "2-3 hari kerja"
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
{
    Schema::table('layanan', function (Blueprint $table) {
        $table->dropColumn(['nama_layanan', 'kategori', 'tipe_ukuran', 'deskripsi', 'harga', 'estimasi_waktu', 'gambar']);
    });
}
};