@extends('layout.app')

@section('title', 'Kategori')

@section('content')

<div class="container mt-4">
    <h2>PENDIDIKAN</h2>
    <div class="row">
        <div class="col-md-3 mb-3 shadow-lg p-4 border-0 rounded-4">
            <div class="card-body">
                <img src="{{ asset('storage/img/pendidikan1.jpg') }}" class="card-img-top" width="200px">
                <div class="card-body">
                    <small class="text-muted">JagadPustaka</small>
                    <h6>Manajemen Pendidikan Berbasis Sekolah</h6>
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