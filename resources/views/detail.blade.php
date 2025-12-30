@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<div class="container mt-4">


    <div class="row">
        

        <div class="col-md-6">
            <img src="https://via.placeholder.com/400" class="img-fluid">
        </div>

        <div class="col-md-6">
            <h3>Sepatu Sneakers</h3>
            <h4 class="text-danger">Rp120.000</h4>
            <p>Deskripsi produk ditulis di sini.</p>

            <button class="btn btn-primary w-100">
                Beli Sekarang
            </button>
        </div>

    </div>
</div>
@endsection
