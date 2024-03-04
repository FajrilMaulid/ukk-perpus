@extends('layouts.admin')

@section('content')
<div class="col-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Kategori</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" placeholder="Nama Kategori">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection