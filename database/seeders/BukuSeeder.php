<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;
use Illuminate\Support\Str;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data buku yang akan di-seed
        $bukuData = [
            [
                'judul' => 'Judul Buku Pertama',
                'sampul' => 'sampul1.jpg',
                'penulis' => 'Penulis A',
                'penerbit' => 'Penerbit X',
                'tahun_terbit' => 2020,
                'kategori_id' => 1,
            ],
            [
                'judul' => 'Judul Buku Kedua',
                'sampul' => 'sampul2.jpg',
                'penulis' => 'Penulis B',
                'penerbit' => 'Penerbit Y',
                'tahun_terbit' => 2021,
                'kategori_id' => 2,
            ],
            // Tambahkan data buku lainnya di sini
        ];

        // Loop untuk menambahkan data buku
        foreach ($bukuData as $data) {
            // Menambahkan slug berdasarkan judul buku
            $data['slug'] = Str::slug($data['judul']);

            // Menyimpan data buku ke dalam database
            Buku::create($data);
        }
    }
}
