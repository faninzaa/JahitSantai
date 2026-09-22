<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // UserSeeder::class,       // aktifkan kalau sudah ada, taruh paling atas
            LayananSeeder::class,
            ProfilukuranSeeder::class,
            UkuranatasSeeder::class,
            UkuranbawahSeeder::class,
            PesananSeeder::class,
            KonsultasiSeeder::class,
            UlasanSeeder::class,
        ]);
    }
}
