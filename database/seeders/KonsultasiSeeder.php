<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KonsultasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Catatan: pesanan_id = 1 mengacu ke baris pertama dari PesananSeeder.
     * pengirim_id diasumsikan user_id = 1 (user) dan 2 (admin) bergantian.
     */
    public function run(): void
    {
        DB::table('konsultasi')->insert([
            [
                'pesanan_id'  => 1,
                'pengirim_id' => 1,
                'isi_pesan'   => 'Halo, saya mau tanya untuk permak rok ini apakah bisa dipendekkan 5cm?',
                'waktu'       => now()->subHours(3),
                'created_at'  => now()->subHours(3),
                'updated_at'  => now()->subHours(3),
            ],
            [
                'pesanan_id'  => 1,
                'pengirim_id' => 2,
                'isi_pesan'   => 'Bisa kak, nanti kami sesuaikan sesuai catatan yang diisi ya.',
                'waktu'       => now()->subHours(2),
                'created_at'  => now()->subHours(2),
                'updated_at'  => now()->subHours(2),
            ],
        ]);
    }
}
