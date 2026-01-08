@extends('layout.app')

@section('title', 'Kategori')

@section('content')

<div class="container mt-4">
    <h2>OLAHRAGA</h2>
    <div class="row">
        @foreach($buku as $b)
            <div class="col-md-3 mb-3">
                <div class="card shadow-lg border-0 rounded-4 h-100">
                    <img src="{{ asset('storage/img/' . $b->sampul) }}" class="card-img-top" style="width: 100%; height: auto;">
                    <div class="card-body">
                        <small class="text-muted">JagadPustaka</small>
                        <h6>{{ $b->judul }}</h6>
                        <p class="text-danger fw-bold">Rp{{ number_format($b->harga, 0, ',', '.') }}</p>
                        <form action="/keranjang/tambah/{{ $b->id }}" method="POST">
                            @csrf
                            <button class="btn btn-primary w-100">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection