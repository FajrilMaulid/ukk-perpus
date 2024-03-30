@extends('layouts.admin')

@section('content')
<section class="content pt-3">
    <div class="container">
        <h2>Daftar Peminjaman</h2>
        <a href="{{ route('admin.peminjaman.create') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>
        <table class="table">
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
                @foreach ($peminjamans as $peminjaman)
                    <tr>
                        <td>{{ $peminjaman->id }}</td>
                        <td>{{ $peminjaman->user->name_lengkap }}</td>
                        <td>{{ $peminjaman->buku->judul }}</td>
                        <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                        <td>{{ $peminjaman->tanggal_pengembalian }}</td>
                        <td>
                            @if ($peminjaman->status_peminjaman == 'Dipinjam')
                                <div class="alert alert-warning" role="alert">
                                    Dipinjam
                                </div>
                            @elseif ($peminjaman->status_peminjaman == 'Dikembalikan')
                                <div class="alert alert-success" role="alert">
                                    Dikembalikan
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
