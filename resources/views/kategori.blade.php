@extends('layout.app')

@section('title', 'Kategori')

@section('content')
<div class="container mt-4">

    <h3 class="mb-4">Kategori Buku</h3>

    <div class="row">

        <!-- Kategori 1 -->
        <div class="col-md-3 mb-2">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Pendidikan</h5>
                    <p class="text-muted">12 Produk</p>
                    <a href="/pendidikan" class="btn btn-outline-primary btn-sm">
                        Lihat
                    </a>
                </div>
            </div>
        </div>

        <!-- Kategori 2 -->
        <div class="col-md-3 mb-2">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Olahraga</h5>
                    <p class="text-muted">8 Produk</p>
                    <a href="/olahraga" class="btn btn-outline-primary btn-sm">
                        Lihat
                    </a>
                </div>
            </div>
        </div>

        <!-- Kategori 3 -->
        <div class="col-md-3 mb-2">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Fiksi</h5>
                    <p class="text-muted">15 Produk</p>
                    <a href="fiksi" class="btn btn-outline-primary btn-sm">
                        Lihat
                    </a>
                </div>
            </div>
        </div>

        <!-- Kategori 4 -->
        <div class="col-md-3 mb-2">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Desain</h5>
                    <p class="text-muted">5 Produk</p>
                    <a href="/fiksi" class="btn btn-outline-primary btn-sm">
                        Lihat
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection