<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        return view('admin.buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.buku.create', ['kategori' => $kategori]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'sampul' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'kategori_id' => 'required',
        ]);

        $sampul = $request->file('sampul');
        $sampul_name = Str::random(20) . '.' . $sampul->getClientOriginalExtension();
        $sampul->storeAs('public/buku', $sampul_name);

        $buku = new Buku([
            'judul' => $request->get('judul'),
            'sampul' => $sampul_name,
            'penulis' => $request->get('penulis'),
            'penerbit' => $request->get('penerbit'),
            'tahun_terbit' => $request->get('tahun_terbit'),
            'kategori_id' => $request->get('kategori_id'),
        ]);
        $buku->save();

        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::find($id);
        $kategori = Kategori::all();
        return view('admin.buku.edit', compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->kategori_id = $request->kategori_id;

        if ($request->hasFile('sampul')) {
            if ($buku->sampul) {
                Storage::delete('public/buku/' . $buku->sampul);
            }
            $file = $request->file('sampul');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/buku', $filename);
            $buku->sampul = $filename;
        }

        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        Storage::delete('public/buku/'.$buku->sampul);
        $buku->delete();

        return redirect('/buku')->with('success', 'Buku berhasil dihapus');
    }
}
