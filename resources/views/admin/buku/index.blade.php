@extends('layouts.admin')

@section('content')

<div class="col-12 mt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Buku</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
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
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buku as $buku)
                    <tr>
                        <td>{{ $buku->id }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->sampul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ $buku->penerbit }}</td>
                        <td>{{ $buku->tahun_terbit }}</td>
                        <td>
                            <a href="/buku/{{ $buku->id }}/show" class="btn btn-primary">Show</a>
                            <a href="/buku/{{ $buku->id }}/edit" class="btn btn-warning">Edit</a>
                            <a href="/buku/{{ $buku->id }}/delete" class="btn btn-danger" onclick="return confirm('Apakah Yakin {{ $buku->judul }} Dihapus?')">Hapus</a>
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

@endsection