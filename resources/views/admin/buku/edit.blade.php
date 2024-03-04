@extends('layouts.admin')

@section('content')

<section class="content pt-3 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Buku</h2>
                <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ $buku->judul }}">
                    </div>
                    <div class="form-group">
                        <label for="sampul">Sampul</label>
                        <input type="file" class="form-control" id="sampul" name="sampul">
                        @if($buku->sampul)
                        <div class="mt-2">
                            <img src="{{ asset('storage/buku/' . $buku->sampul) }}" alt="{{ $buku->judul }}" style="max-width: 200px;">
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $buku->penulis }}">
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $buku->penerbit }}">
                    </div>
                    <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ $buku->tahun_terbit }}">
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select class="form-control" id="kategori_id" name="kategori_id">
                            @foreach ($kategori as $kat)
                                <option value="{{ $kat->id }}" @if($kat->id == $buku->kategori_id) selected @endif>{{ $kat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
