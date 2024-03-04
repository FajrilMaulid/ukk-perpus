@extends('layouts.admin')

@section('content')
<div class="col-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Kategori</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori:</label>
                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
