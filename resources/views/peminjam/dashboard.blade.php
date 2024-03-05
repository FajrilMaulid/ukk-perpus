@extends('layouts.peminjam')

@section('content')

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-4">
        <div class="row gx-4 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @if (is_null($buku))
                <div class="col mb-5 mt-5">
                    <div class="alert alert-warning" role="alert">
                        Buku tidak tersedia.
                    </div>
                </div>
            @else
                @foreach ($buku as $buku)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <div style="height: 385px; overflow: hidden;">
                                <img class="card-img-top p-3" style="object-fit: cover; width: 100%;" src="{{ asset('storage/buku/' . $buku->sampul) }}" alt="{{ $buku->judul }}" />
                            </div>
                            <!-- Product details-->
                            <div class="card-body p-3">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $buku->judul }}</h5>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ url('buku.show') }}">Lihat Buku</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

@endsection
