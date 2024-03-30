<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function index()
    {
        $userCollection = Koleksi::where('user_id', auth()->id())->get();
        return view('peminjam.koleksi', ['collection' => $userCollection]);
    }
}
