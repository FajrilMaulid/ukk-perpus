<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class PetugasUlasanController extends Controller
{
    public function index()
    {
        $ulasan = Ulasan::paginate(10);
        $buku = Buku::all();
        $user = User::all();

        return view('petugas.ulasan.index', compact('ulasan'));
    }

    public function destroy(string $id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();

        return redirect()->route('ulasan.index')
            ->with('success', 'Ulasan berhasil dihapus.');
    }
}
