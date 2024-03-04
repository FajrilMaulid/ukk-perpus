<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('12345678'),
            'email' => 'admin@gmail.com',
            'name_lengkap' => 'Administrator',
            'alamat' => 'Alamat Administrator',
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'petugas',
            'password' => Hash::make('12345678'),
            'email' => 'petugas@gmail.com',
            'name_lengkap' => 'Petugas',
            'alamat' => 'Alamat Petugas',
            'role' => 'petugas',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'peminjam',
            'password' => Hash::make('12345678'),
            'email' => 'peminjam@gmail.com',
            'name_lengkap' => 'Peminjam',
            'alamat' => 'Alamat Peminjam',
            'role' => 'peminjam',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
