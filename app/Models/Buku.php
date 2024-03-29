<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;
    protected $table = "buku";
    protected $fillable = ['judul','sampul','penulis','penerbit','tahun_terbit','kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
