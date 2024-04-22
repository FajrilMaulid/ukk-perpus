@extends('layouts.petugas')

@section('content')
<section class="content pt-3">
    <div class="container pt-3">
        <div class="col-12">
            <a href="{{ route('petugas.peminjaman.create') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>
            <a href="{{ route('petugas.peminjaman.exportPdf') }}" class="btn btn-danger mb-3">Export PDF</a>
            <a href="{{ route('petugas.peminjaman.exportExcel') }}" class="btn btn-success mb-3">Export Excel</a>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Peminjaman</h3>
                    <div class="card-tools">
                        <form action="{{ route('petugas.peminjaman.search') }}" method="GET" class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="q" class="form-control float-right" placeholder="Cari...">
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
                                <th>User</th>
                                <th>Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status Peminjaman</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user->name_lengkap }}</td>
                                    <td>{{ $item->buku->judul }}</td>
                                    <td>{{ $item->tanggal_peminjaman }}</td>
                                    <td>{{ $item->tanggal_pengembalian }}</td>
                                    <td>
                                        @if ($item->status_peminjaman == 'Dipinjam')
                                            <div class="alert alert-warning" role="alert">
                                                Dipinjam
                                            </div>
                                        @elseif ($item->status_peminjaman == 'Dikembalikan')
                                            <div class="alert alert-success" role="alert">
                                                Dikembalikan
                                            </div>
                                        @elseif ($item->status_peminjaman == 'Ditolak')
                                            <div class="alert alert-danger" role="alert">
                                                Ditolak
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.peminjaman.tolak', $item->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menolak peminjaman?')">Tolak</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $peminjaman->render('pagination.custom-pagination') }}
    </div>
</section>
@endsection
