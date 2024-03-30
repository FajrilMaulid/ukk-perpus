<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Koleksi extends Model
{
    use HasFactory;

    protected $table = "koleksi";

    protected $fillable = [
        'user_id',
        'buku_id',
        'peminjaman_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}
