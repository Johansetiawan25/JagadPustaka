@extends('layout.app')

@section('title', 'Keranjang')

@section('content')
<div class="container mt-4">
    <h3>Keranjang Belanja</h3>

    @if(empty($cart))
        <p>Keranjang kosong</p>
    @else
        <table class="table">
            <tr>
                <th>Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>

            @php $total = 0; @endphp

            @foreach($cart as $item)
                @php
                    $subtotal = $item['qty'] * $item['harga'];
                    $total += $subtotal;
                @endphp
                <tr>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['qty'] }}</td>
                    <td>Rp {{ number_format($item['harga']) }}</td>
                    <td>Rp {{ number_format($subtotal) }}</td>
                </tr>
            @endforeach
        </table>

        <h5>Total: Rp {{ number_format($total) }}</h5>
    @endif
</div>
@endsection
