<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KoleksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data yang ingin Anda tambahkan ke tabel koleksi
        $data = [
            [
                'user_id' => 1, // Ganti dengan ID user yang sesuai
                'buku_id' => 1, // Ganti dengan ID buku yang sesuai
                'peminjaman_id' => 1, // Ganti dengan ID peminjaman yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Ganti dengan ID user yang sesuai
                'buku_id' => 2, // Ganti dengan ID buku yang sesuai
                'peminjaman_id' => 2, // Ganti dengan ID peminjaman yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Insert data ke tabel koleksi
        DB::table('koleksi')->insert($data);
    }
}
