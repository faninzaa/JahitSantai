<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UkuranbawahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Catatan: profil_ukuran_id = 1 mengacu ke baris pertama dari ProfilukuranSeeder.
     */
    public function run(): void
    {
        DB::table('ukuranbawah')->insert([
            [
                'profil_ukuran_id' => 1,
                'lingkar_panggul1' => 92,
                'lingkar_panggul2' => 94,
                'panjang_rok'      => 55,
                'ban'              => 68,
                'panggul1'         => 45,
                'panggul2'         => 47,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ]);
    }
}
