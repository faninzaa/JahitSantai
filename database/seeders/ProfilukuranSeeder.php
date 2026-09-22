<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilukuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Catatan: seeder ini asumsikan user_id = 1 sudah ada (akun user biasa kamu).
     * Sesuaikan angka user_id di bawah kalau id akun kamu berbeda.
     */
    public function run(): void
    {
        DB::table('profilukuran')->insert([
            [
                'user_id'     => 1,
                'nama_profil' => 'Ukuran Saya',
                'waktu'       => now(),
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
