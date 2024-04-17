<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data yang ingin Anda tambahkan ke tabel users
        $data = [
            [
                'username' => 'admin',
                'password' => Hash::make('admin123'), // Anda dapat mengganti password sesuai kebutuhan
                'email' => 'admin@example.com',
                'name_lengkap' => 'Admin',
                'alamat' => 'Alamat Admin',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'petugas',
                'password' => Hash::make('petugas123'), // Anda dapat mengganti password sesuai kebutuhan
                'email' => 'petugas@example.com',
                'name_lengkap' => 'Petugas',
                'alamat' => 'Alamat Petugas',
                'role' => 'petugas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'peminjam',
                'password' => Hash::make('peminjam123'), // Anda dapat mengganti password sesuai kebutuhan
                'email' => 'peminjam@example.com',
                'name_lengkap' => 'Peminjam',
                'alamat' => 'Alamat Peminjam',
                'role' => 'peminjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Insert data ke tabel users
        DB::table('users')->insert($data);
    }
}
