<?php

namespace App\Models;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "kategori";
    protected $fillable = ['nama_kategori'];

    public function bukus()
    {
        return $this->hasMany(Buku::class);
    }
}
