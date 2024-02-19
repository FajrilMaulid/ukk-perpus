<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama peran (role), misal: admin, petugas, peminjam
            $table->timestamps();
        });

        // Menambahkan kolom role_id pada tabel users
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained()->onDelete('cascade'); // Menambahkan foreign key
        });

        // Memasukkan data peran (role) awal
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'petugas'],
            ['name' => 'peminjam'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });

        Schema::dropIfExists('role');
    }
};
