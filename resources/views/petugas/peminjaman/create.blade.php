@extends('layouts.petugas')

@section('content')
<section class="content pt-3">
    <div class="container">
        <h2>Create Peminjaman</h2>
        <form action="{{ route('petugas.peminjaman.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select class="form-select" id="user_id" name="user_id" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name_lengkap }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="buku_id" class="form-label">Buku</label>
                <select class="form-select" id="buku_id" name="buku_id" required>
                    @foreach ($buku as $b)
                        <option value="{{ $b->id }}">{{ $b->judul }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Pinjam Buku</button>
        </form>
    </div>
</section>
@endsection