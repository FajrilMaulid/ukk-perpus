@extends('layouts.petugas')

@section('content')
<section class="content">
    <div class="pt-2">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <a href="{{ route('petugas.kategori.create') }}" class="btn btn-primary mb-3 mt-3 mx-2">Tambah Data</a>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Kategori</h3>
                <div class="card-tools">
                    <form action="{{ route('petugas.kategori.search') }}" method="GET" class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="q" class="form-control float-right" placeholder="Cari kategori...">
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
                            <th>Nama Kategori</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>
                                <a href="{{ route('petugas.kategori.show', $item->id) }}" class="btn btn-sm btn-primary">Lihat</a>
                                <a href="{{ route('petugas.kategori.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('petugas.kategori.destroy', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
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
        {{ $kategori->render('pagination.custom-pagination') }}
    </div>
</section>
@endsection
