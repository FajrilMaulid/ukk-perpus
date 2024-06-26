<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ulasan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\LengthAwarePaginator;

class DashboardController extends Controller
{
    public function showUserForm()
    {
        $buku = Buku::paginate(12);
        $kategori = Kategori::all();
        
        if ($buku->isEmpty()) {
            $buku = null; 
        }

        return view('peminjam.dashboard', compact('buku','kategori'));
    }

    public function showBooksByCategory($category)
    {
        $buku = Buku::whereHas('kategori', function($query) use ($category) {
            $query->where('nama_kategori', $category);
        })->paginate(12);
    
        if ($buku->isEmpty()) {
            $buku = null; 
        }
    
        return view('peminjam.dashboard', compact('buku'));
    }

    public function searchBooks(Request $request)
    {
        $query = $request->input('query');
        $buku = Buku::where('judul', 'LIKE', "%$query%")->paginate(12);

        if ($buku->isEmpty()) {
            $buku = null; 
        }
        
        return view('peminjam.dashboard', compact('buku'));
    }

    public function show($slug)
    {
        $user = Auth::user();
        $buku = Buku::where('slug', $slug)->firstOrFail();
        $kategori = Kategori::all();

        $ulasan = $buku->ulasan;

        return view('peminjam.show', compact('buku', 'kategori', 'ulasan'));
    }


    public function addComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        // Buat komentar baru
        $komentar = new Ulasan();
        $komentar->user_id = Auth::id(); // Mengambil ID pengguna yang saat ini login
        $komentar->buku_id = $id;
        $komentar->ulasan = $request->comment;
        $komentar->rating = 0; // Anda mungkin ingin menambahkan fitur penilaian juga
        $komentar->save();

        // Redirect kembali ke halaman buku dengan pesan sukses
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function editComment($id)
    {
        $komentar = Ulasan::findOrFail($id);

        // Pastikan pengguna yang masuk adalah pemilik komentar
        if ($komentar->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengedit komentar ini.');
        }

        return view('peminjam.edit_comment', compact('komentar'));
    }

    public function updateComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $komentar = Ulasan::findOrFail($id);

        // Pastikan pengguna yang masuk adalah pemilik komentar
        if ($komentar->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengedit komentar ini.');
        }

        $komentar->ulasan = $request->comment;
        $komentar->save();

        return redirect()->back()->with('success', 'Komentar berhasil diperbarui!');
    }

    public function deleteComment($id)
    {
        $komentar = Ulasan::findOrFail($id);

        // Pastikan pengguna yang masuk adalah pemilik komentar
        if ($komentar->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
        }

        $buku_id = $komentar->buku_id;
        $komentar->delete();

        return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
    }

}
