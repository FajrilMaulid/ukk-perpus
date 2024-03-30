<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function index()
    {
        $ulasan = Ulasan::all();
        $buku = Buku::all();
        $user = User::all();

        return view('admin.ulasan.index', compact('ulasan'));
    }

    public function destroy(string $id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();

        return redirect()->route('ulasan.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
