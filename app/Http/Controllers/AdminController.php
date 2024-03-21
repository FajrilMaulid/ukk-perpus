<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAdminForm()
    {
        $bukuCount = Buku::count();
        $kategoriCount = Kategori::count();
        $usersCount = User::count();
        return view('admin.dashboard', ['buku_count' => $bukuCount, 'kategori_count' => $kategoriCount, 'users_count' => $usersCount]);
    }
}
