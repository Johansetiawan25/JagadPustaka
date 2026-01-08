@extends('layout.app')

@section('title', 'Beranda')

@section('content')

<div class="container mt-4">

    <!--pop up bos-->
    @if(session('logout_message'))
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        {{ session('logout_message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <div class="row g-3 ">

        <div class="col-md-8">
            <div id="carouselExampleAutoplaying" class="carousel slide " data-bs-ride="carousel">
                <div class="carousel-inner rounded">
                    <div class="carousel-item active">
                        <img src="{{ asset('storage/img/promo3.jpeg') }}" class="d-block w-100 rounded" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('storage/img/promo4.jpeg') }}" class="d-block w-100 rounded" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('storage/img/promo5.jpeg') }}" class="d-block w-100 rounded" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>


        <div class="col-md-4 d-flex flex-column gap-3">
            <div class="card">
                <img src="{{ asset('storage/img/promo1.jpeg') }}"
                    class="card-img-top rounded"
                    alt="Promo 1">
            </div>
            <div class="card">
                <img src="{{ asset('storage/img/promo2.jpeg') }}"
                    class="card-img-top rounded"
                    alt="Promo 2">
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="card mb-3">
        <img src="{{ asset('storage/img/banner.png') }}"
            class="card-img-top rounded" alt="...">
    </div>
</div>



<div class="container mt-4">
    <h2>Kategori Terlaris</h2>
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card">
                <img src="{{ asset('storage/img/jojohan.png') }}" class="card-img-top" width="200px">
                <div class="card-body">
                    <h6>Sepatu Sneakers</h6>
                    <p class="text-danger fw-bold">Rp120.000</p>
                    <form action="/keranjang/tambah/1" method="POST">
                        @csrf
                        <button class="btn btn-primary">
                            Tambah ke Keranjang
                        </button>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card">
                <img src="{{ asset('storage/img/jojohan.png') }}" class="card-img-top" width="200px">
                <div class="card-body">
                    <h6>Sepatu Sneakers</h6>
                    <p class="text-danger fw-bold">Rp120.000</p>
                    <a href="/produk/1" class="btn btn-primary btn-sm w-100">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('storage/img/jojohan.png') }}" class="card-img-top" width="200px">
                <div class="card-body">
                    <h6>Sepatu Sneakers</h6>
                    <p class="text-danger fw-bold">Rp120.000</p>
                    <a href="/produk/1" class="btn btn-primary btn-sm w-100">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('storage/img/jojohan.png') }}" class="card-img-top" width="200px">
                <div class="card-body">
                    <h6>Sepatu Sneakers</h6>
                    <p class="text-danger fw-bold">Rp120.000</p>
                    <a href="/produk/1" class="btn btn-primary btn-sm w-100">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('storage/img/jojohan.png') }}" class="card-img-top" width="200px">
                <div class="card-body">
                    <h6>Sepatu Sneakers</h6>
                    <p class="text-danger fw-bold">Rp120.000</p>
                    <a href="/produk/1" class="btn btn-primary btn-sm w-100">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('storage/img/jojohan.png') }}" class="card-img-top" width="200px">
                <div class="card-body">
                    <h6>Sepatu Sneakers</h6>
                    <p class="text-danger fw-bold">Rp120.000</p>
                    <a href="/produk/1" class="btn btn-primary btn-sm w-100">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <h2>Buku Terlaris</h2>
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card">
                <img src="{{ asset('storage/img/jojohan.png') }}" class="card-img-top" width="200px">
                <div class="card-body">
                    <h6>Sepatu Sneakers</h6>
                    <p class="text-danger fw-bold">Rp120.000</p>
                    <a href="/produk/1" class="btn btn-primary btn-sm w-100">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card">
                <img src="{{ asset('storage/img/jojohan.png') }}" class="card-img-top" width="200px">
                <div class="card-body">
                    <h6>Sepatu Sneakers</h6>
                    <p class="text-danger fw-bold">Rp120.000</p>
                    <a href="/produk/1" class="btn btn-primary btn-sm w-100">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('storage/img/jojohan.png') }}" class="card-img-top" width="200px">
                <div class="card-body">
                    <h6>Sepatu Sneakers</h6>
                    <p class="text-danger fw-bold">Rp120.000</p>
                    <a href="/produk/1" class="btn btn-primary btn-sm w-100">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('storage/img/jojohan.png') }}" class="card-img-top" width="200px">
                <div class="card-body">
                    <h6>Sepatu Sneakers</h6>
                    <p class="text-danger fw-bold">Rp120.000</p>
                    <a href="/produk/1" class="btn btn-primary btn-sm w-100">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('storage/img/jojohan.png') }}" class="card-img-top" width="200px">
                <div class="card-body">
                    <h6>Sepatu Sneakers</h6>
                    <p class="text-danger fw-bold">Rp120.000</p>
                    <a href="/produk/1" class="btn btn-primary btn-sm w-100">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('storage/img/jojohan.png') }}" class="card-img-top" width="200px">
                <div class="card-body">
                    <h6>Sepatu Sneakers</h6>
                    <p class="text-danger fw-bold">Rp120.000</p>
                    <a href="/produk/1" class="btn btn-primary btn-sm w-100">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection