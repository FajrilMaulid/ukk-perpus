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
    <div class="container pt-3">
        <div class="col-12">    
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Buku</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Buku</th>
                                <th>Ulasan</th>
                                <th>Rating</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ulasan as $ulasan)
                            <tr>
                                <td>{{ $ulasan->id }}</td>
                                <td>{{ $ulasan->user->name_lengkap }}</td>
                                <td>{{ $ulasan->buku->judul }}</td>
                                <td>{{ $ulasan->ulasan }}</td>
                                <td>{{ $ulasan->rating }}</td>
                                <td>
                                <form action="{{ route('ulasan.destroy', $ulasan->id) }}" method="POST" style="display: inline;">
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
        </div>
    </div>
</section>
@endsection
