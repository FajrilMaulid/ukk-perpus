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
    <div class="container pt-3">
        <div class="col-12">    
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ulasan Buku</h3>
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
                            @foreach($ulasan as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->user->name_lengkap }}</td>
                                <td>{{ $item->buku->judul }}</td>
                                <td>{{ $item->ulasan }}</td>
                                <td>{{ $item->rating }}</td>
                                <td>
                                <form action="{{ route('petugas.ulasan.destroy', $item->id) }}" method="POST" style="display: inline;">
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
    <div class="d-flex justify-content-center">
        {{ $ulasan->render('pagination.custom-pagination') }}
    </div>
</section>
@endsection
