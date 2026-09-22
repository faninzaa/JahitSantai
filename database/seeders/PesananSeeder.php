<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Catatan: user_id = 1, layanan_id = 1, profil_ukuran_id = 1
     * mengacu ke data yang sudah dibuat sebelumnya. Sesuaikan kalau berbeda.
     */
    public function run(): void
    {
        DB::table('pesanan')->insert([
            [
                'user_id'            => 1,
                'layanan_id'         => 1,
                'profil_ukuran_id'   => 1,
                'status'             => 'diproses',
                'total'              => 40000,
                'metode_pengiriman'  => 'kurir',
                'alamat'             => 'Jl. Contoh No. 123, Malang',
                'no_hp'              => '081234567890',
                'waktu'              => now(),
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
            [
                'user_id'            => 1,
                'layanan_id'         => 2,
                'profil_ukuran_id'   => null,
                'status'             => 'selesai',
                'total'              => 100000,
                'metode_pengiriman'  => 'ambil_sendiri',
                'alamat'             => null,
                'no_hp'              => '081234567890',
                'waktu'              => now()->subDays(5),
                'created_at'         => now()->subDays(5),
                'updated_at'         => now()->subDays(2),
            ],
        ]);
    }
}
