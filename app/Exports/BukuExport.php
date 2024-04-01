<?php

namespace App\Exports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BukuExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Buku::with('kategori')->get();
    }

    public function map($buku): array
    {
        return [
            $buku->id,
            $buku->judul,
            $buku->penulis,
            $buku->penerbit,
            $buku->tahun_terbit,
            $buku->kategori->nama_kategori,
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Judul',
            'Penulis',
            'Penerbit',
            'Tahun terbit',
            'Kategori',
        ];
    }
}
