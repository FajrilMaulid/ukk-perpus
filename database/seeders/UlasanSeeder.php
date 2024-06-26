<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UlasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data yang ingin Anda tambahkan ke tabel ulasan
        $data = [
            [
                'user_id' => 1, // Ganti dengan ID user yang sesuai
                'buku_id' => 1, // Ganti dengan ID buku yang sesuai
                'ulasan' => 'Buku ini sangat bagus!',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Ganti dengan ID user yang sesuai
                'buku_id' => 2, // Ganti dengan ID buku yang sesuai
                'ulasan' => 'Saya suka dengan isi bukunya.',
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Insert data ke tabel ulasan
        DB::table('ulasan')->insert($data);
    }
}
