<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UlasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Catatan: user_id = 1, pesanan_id = 2 (pesanan yang sudah "selesai").
     */
    public function run(): void
    {
        DB::table('ulasan')->insert([
            [
                'user_id'    => 1,
                'pesanan_id' => 2,
                'rating'     => 5,
                'isi_ulasan' => 'Permak roknya rapi banget, pas banget sama badanku, prosesnya juga cepet.',
                'waktu'      => now()->subDays(1),
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
        ]);
    }
}
