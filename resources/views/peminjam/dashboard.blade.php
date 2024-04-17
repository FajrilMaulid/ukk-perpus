@extends('layouts.peminjam')

@section('content')

<style>
    .product {
    transition: transform 0.3s ease-in-out;
    }
    .product:hover {
        transform: scale(1.05);
    }
    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
</style>

<section class="py-5">
    <div class="row justify-content-end mb-3 mx-4">
        <div class="col-md-4">
            <form action="{{ route('search.books') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari buku..." name="query">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container px-4 px-lg-5 mt-4">
        <div class="row gx-4 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @if (is_null($buku))
                <div class="col mb-5 mt-5">
                    <div class="alert alert-warning text-center" role="alert">
                        Buku tidak tersedia.
                    </div>
                </div>
            @else
                @foreach ($buku->sortByDesc('created_at') as $item)
                    <div class="col mb-5 product">
                        <div class="card h-100">
                            <!-- Product image-->
                            <div style="height: 385px; overflow: hidden;">
                                <img class="card-img-top p-3" style="object-fit: cover; width: 100%;" src="{{ asset('storage/buku/' . $item->sampul) }}" alt="{{ $item->judul }}" />
                            </div>
                            <!-- Product details-->
                            <div class="card-body p-3">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $item->judul }}</h5>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('peminjam.show', ['slug' => $item->slug]) }}">Lihat Buku</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <!-- Di dalam tampilan blade Anda -->
    @if($buku && $buku->count() > 0)
    <!-- Tampilkan data buku -->
    <div class="container px-4 px-lg-5 mt-4">
        <!-- Konten buku -->
        <div class="books-container">
            <div class="row gx-4 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <!-- Tampilkan data buku -->
            </div>
        </div>
        <!-- Pagination -->
        <div class="d-flex justify-content-center pagination-container">
            {{ $buku->render('pagination.custom-pagination') }}
        </div>
    </div>
    @endif
</section>

@endsection
