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
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3 mt-3 mx-2">Tambah User</a>
    <a href="{{ route('users.exportPdf') }}" class="btn btn-danger mb-3 mt-3">Export Data</a>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Buku</h3>
                <div class="card-tools">
                    <form action="{{ route('users.search') }}" method="GET" class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="q" class="form-control float-right" placeholder="Cari user...">
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
                            <th>Username</th>
                            <th>email</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>Role</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->name_lengkap }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->role }}</td>
                            <td>
                                <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('users.destroy', $item->id) }}" method="POST" style="display: inline;">
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
        {{ $user->render('pagination.custom-pagination') }}
    </div>
</section>

@endsection