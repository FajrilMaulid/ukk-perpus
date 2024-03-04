@extends('layouts.admin')

@section('content')
<div class="col-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Kategori</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                        
                    </tr>
                    <tr>
                        <td>{{ $kategori->id }}</td>
                        <td>{{ $kategori->nama_kategori }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ route('kategori.index') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection