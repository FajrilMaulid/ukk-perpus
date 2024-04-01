<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use App\Exports\UlasanExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Date;

class PetugasUlasanController extends Controller
{
    public function index()
    {
        $ulasan = Ulasan::paginate(10);
        $buku = Buku::all();
        $user = User::all();

        return view('petugas.ulasan.index', compact('ulasan'));
    }

    public function exportPdf()
    {        
        $ulasan = Ulasan::all();
        $pdf = Pdf::loadView('pdf.export-ulasan', ['ulasan' => $ulasan])->setOption(['defaultFont' => 'sans-serif']);
        // Membuat nama file PDF dengan waktu saat ini
        $fileName = 'export-ulasanr-' . Date::now()->format('Y-m-d_H-i-s') . '.pdf';
        
        return $pdf->download($fileName);
    }

    public function exportExcel()
    {
        return (new UlasanExport)->download('ulasan-'.Carbon::now()->timestamp.'.xlsx');
    }

    public function destroy(string $id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();

        return redirect()->route('ulasan.index')
            ->with('success', 'Ulasan berhasil dihapus.');
    }
}
