<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('layanan')->insert([
            [
                'nama_layanan'   => 'Permak Rok',
                'kategori'       => 'Permak',
                'tipe_ukuran'    => 'bawah',
                'deskripsi'      => 'Kecilkan pinggang, pendekkan panjang, atau rapikan kelim rok sesuai bentuk badan.',
                'harga'          => 30000,
                'estimasi_waktu' => '2-3 hari kerja',
                'gambar'         => 'images/gambaratas.png',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'nama_layanan'   => 'Jahit Kemeja',
                'kategori'       => 'Jahit Baru',
                'tipe_ukuran'    => 'atas',
                'deskripsi'      => 'Buat kemeja custom dengan bahan pilihan Anda. Pilih ukuran, warna, dan detail.',
                'harga'          => 100000,
                'estimasi_waktu' => '4-5 hari kerja',
                'gambar'         => 'images/gambaratas.png',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'nama_layanan'   => 'Custom Kebaya',
                'kategori'       => 'Custom Desain',
                'tipe_ukuran'    => 'keduanya',
                'deskripsi'      => 'Wujudkan kebaya impian Anda dengan desain dan ukuran yang presisi.',
                'harga'          => 170000,
                'estimasi_waktu' => '7-10 hari kerja',
                'gambar'         => 'images/gambaratas.png',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'nama_layanan'   => 'Custom Dress',
                'kategori'       => 'Custom Desain',
                'tipe_ukuran'    => 'keduanya',
                'deskripsi'      => 'Desain dress impian Anda dan biarkan kami mewujudkannya dengan jahitan presisi.',
                'harga'          => 300000,
                'estimasi_waktu' => '7-10 hari kerja',
                'gambar'         => 'images/gambaratas.png',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'nama_layanan'   => 'Ukur di Rumah',
                'kategori'       => 'Aksesoris',
                'tipe_ukuran'    => 'keduanya',
                'deskripsi'      => 'Layanan datang ke rumah untuk mengambil ukuran tubuh secara akurat.',
                'harga'          => 25000,
                'estimasi_waktu' => '1 hari kerja',
                'gambar'         => 'images/gambaratas.png',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);
    }
}
