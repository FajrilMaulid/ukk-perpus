@extends('layouts.admin')

@section('content')

<section class="content">
    <div class="pt-2">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3 mt-3 mx-2">Tambah Buku</a>
    <div class="col-12">    
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Buku</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <div class="input-group-append">
                        </div>
                    </div>
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
                        @foreach ($buku as $buku)
                        <tr>
                            <td>{{ $buku->id }}</td>
                            <td>{{ $buku->judul }}</td>
                            <td><img src="{{ asset('storage/buku/' . $buku->sampul) }}" alt="{{ $buku->judul }}" style="max-width: 100px;"></td>
                            <td>{{ $buku->penulis }}</td>
                            <td>{{ $buku->penerbit }}</td>
                            <td>{{ $buku->tahun_terbit }}</td>
                            <td>{{ $buku->kategori->nama_kategori }}</td>
                            <td>
                                <a href="{{ route('peminjam.show', $buku->id) }}" class="btn btn-sm btn-primary">Lihat</a>
                                <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display: inline;">
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
</section>

@endsection