@extends('layouts.admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $buku_count }}</h3>

                        <p>Buku</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-book"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $peminjaman_count }}</h3>

                        <p>Buku Dipinjam</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $users_count }}</h3>

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $kategori_count }}</h3>

                        <p>Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-list"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection