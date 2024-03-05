<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showUserForm()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        return view('peminjam.dashboard', compact('buku','kategori'));
    }

    public function showBooksByCategory($category)
    {
        $buku = Buku::whereHas('kategori', function($query) use ($category) {
            $query->where('nama_kategori', $category);
        })->get();
    
        if ($buku->isEmpty()) {
            $buku = null;
        }
    
        return view('peminjam.dashboard', compact('buku'));
    }
}
