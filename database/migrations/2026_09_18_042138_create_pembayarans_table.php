<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->string('phone');
            $table->integer('qty');
            $table->bigInteger('total');
            $table->enum('status', ['menunggu', 'berhasil', 'gagal'])->default('menunggu');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
