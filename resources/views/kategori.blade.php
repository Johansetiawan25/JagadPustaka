@extends('layout.app')

@section('title', 'Kategori Buku')

@section('content')
<div class="container mt-4">

    <h3 class="mb-4">Kategori Buku</h3>

    <div class="row">
        <!-- Menampilkan kategori -->
        @foreach($kategoris as $kategori)
        <div class="col-md-3 mb-2">
            <div class="card text-center">
                <div class="card-body">
                    <h5>{{ strtoupper($kategori->kategori) }}</h5>
                    <p class="text-muted">
                        {{ $buku->where('kategori', $kategori->kategori)->count() }} Produk
                    </p>
                    <a href="{{ strtolower($kategori->kategori) }}" class="btn btn-outline-primary btn-sm">
                        Lihat
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    

</div>
@endsection
