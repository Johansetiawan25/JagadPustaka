@extends('layout.app')

@section('title', 'Kategori')

@section('content')

<div class="container mt-4">
    <h2>FIKSI</h2>
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


@endsection