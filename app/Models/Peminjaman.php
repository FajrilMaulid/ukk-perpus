<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\User;
use App\Models\Koleksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    public $table = "peminjaman";

    public $fillable = [
        'user_id',
        'buku_id',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status_peminjaman',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function koleksi()
    {
        return $this->hasOne(Koleksi::class);
    }
}
