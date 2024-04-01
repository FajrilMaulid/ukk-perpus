@extends('layouts.admin')

@section('content')

<style>
    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
</style>

<section class="content">
    <div class="pt-2">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3 mt-3 mx-2">Tambah Buku</a>
    <a href="{{ route('buku.exportPdf') }}" class="btn btn-danger mb-3 mt-3 mx-2">Export PDF</a>
    <a href="{{ route('buku.exportExcel') }}" class="btn btn-success mb-3 mt-3 mx-2">Export Excel</a>
    <div class="col-12">    
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Buku</h3>
                <div class="card-tools">
                    <form action="{{ route('buku.search') }}" method="GET" class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="q" class="form-control float-right" placeholder="Cari buku...">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Sampul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun terbit</th>
                            <th>Kategori</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->judul }}</td>
                            <td><img src="{{ asset('storage/buku/' . $item->sampul) }}" alt="{{ $item->judul }}" style="max-width: 100px;"></td>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ $item->penerbit }}</td>
                            <td>{{ $item->tahun_terbit }}</td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            <td>
                                <a href="{{ route('peminjam.show', $item->id) }}" class="btn btn-sm btn-primary">Lihat</a>
                                <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('buku.destroy', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="d-flex justify-content-center">
        {{ $buku->render('pagination.custom-pagination') }}
    </div>
</section>

@endsection