<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data yang ingin Anda tambahkan ke tabel peminjaman
        $data = [
            [
                'user_id' => 1, // Ganti dengan ID user yang sesuai
                'buku_id' => 1, // Ganti dengan ID buku yang sesuai
                'tanggal_peminjaman' => '2024-04-17',
                'tanggal_pengembalian' => '2024-04-24',
                'status_peminjaman' => 'Dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Ganti dengan ID user yang sesuai
                'buku_id' => 2, // Ganti dengan ID buku yang sesuai
                'tanggal_peminjaman' => '2024-04-15',
                'tanggal_pengembalian' => '2024-04-22',
                'status_peminjaman' => 'Dikembalikan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Insert data ke tabel peminjaman
        DB::table('peminjaman')->insert($data);
    }
}
