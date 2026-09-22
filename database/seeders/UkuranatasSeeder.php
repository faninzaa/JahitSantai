<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UkuranatasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Catatan: profil_ukuran_id = 1 mengacu ke baris pertama dari ProfilukuranSeeder.
     */
    public function run(): void
    {
        DB::table('ukuranatas')->insert([
            [
                'profil_ukuran_id' => 1,
                'lingkar_badan'    => 88,
                'lingkar_dada'     => 86,
                'lebar_dada'       => 34,
                'lebar_punggung'   => 36,
                'lebar_bahu'       => 38,
                'panjang_punggung' => 40,
                'panjang_baju'     => 60,
                'panjang_lengan'   => 22,
                'lingkar_lengan'   => 28,
                'panjang_siku'     => 32,
                'lingkar_siku'     => 25,
                'lingkar_pinggang' => 70,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ]);
    }
}
