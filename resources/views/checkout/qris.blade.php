@extends('layout.app')

@section('title', 'Pesanan Anda')

@section('content')
<div class="payment-page position-relative d-flex justify-content-center align-items-center" style="min-height: 75vh;">

    {{-- Ilustrasi dekoratif kiri & kanan --}}
    <div class="decor-left d-none d-lg-block"></div>
    <div class="decor-right d-none d-lg-block"></div>

    <div class="card shadow-lg rounded-4 border-0 p-4" style="max-width: 600px; width: 100%;">
        <div class="card-body text-center">
           
            {{-- QR CODE --}}
            @if($order->status === 'pending')
                <div class="qr-box my-3 p-3">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=160x160&data=ORDER{{ $order->id }}" class="img-fluid rounded">
                </div>
            @endif

            {{-- Rincian Buku --}}
            <p class="text-primary fw-bold fs-5">Detail Pesanan</p>
            <ul class="list-group list-group-flush mb-4 rounded border">
                @foreach($order->items as $item)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ $item->buku->judul }}</span>
                        <span class="fw-bold text-primary">{{ $item->qty }} x Rp{{ number_format($item->harga,0,',','.') }}</span>
                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total</span>
                    <span class="fw-bold text-success">Rp {{ number_format($order->total_harga,0,',','.') }}</span>
                </li>
            </ul>

            {{-- Status dan Instruksi --}}
            @if($order->status === 'pending')
                <h6 class="text-warning fw-bold mb-2">Pesanan menunggu pembayaran</h6>
                <p>Silakan lakukan pembayaran melalui salah satu metode berikut:</p>
                <div class="text-start mb-3" style="font-size:0.9rem;">
                    <strong>Langkah menggunakan QRIS / E-Wallet:</strong>
                    <ol>
                        <li>Buka aplikasi e-wallet Anda (OVO, Dana, Gopay, dll).</li>
                        <li>Pilih menu "Scan QR".</li>
                        <li>Arahkan kamera ke kode QR di atas.</li>
                        <li>Masukkan nominal pembayaran: <strong>Rp {{ number_format($order->total_harga,0,',','.') }}</strong>.</li>
                        <li>Konfirmasi pembayaran.</li>
                        <li>Simpan bukti pembayaran jika diperlukan.</li>
                    </ol>
                    <strong>Langkah transfer bank:</strong>
                    <ol>
                        <li>Login ke mobile banking atau ATM.</li>
                        <li>Pilih menu Transfer</li>
                        <li>Pilih Bank Tujuan <strong>BCA</strong></li>
                        <li>Masukkan nominal pembayaran: <strong>Rp {{ number_format($order->total_harga,0,',','.') }}</strong>.</li>
                        <li>Masukkan nomor rekening tujuan: <strong>123-456-7890 a/n Jagad Pustaka</strong></li>
                        <li>Simpan bukti transfer.</li>
                    </ol>
                </div>
            @else
                @php
                    $statusText = [
                        'bayar' => ['text' => 'Pembayaran telah dikonfirmasi', 'class' => 'text-info'],
                        'selesai' => ['text' => 'Terima kasih telah berbelanja!', 'class' => 'text-success'],
                        'batal' => ['text' => 'Pesanan dibatalkan', 'class' => 'text-danger']
                    ];
                    $st = $statusText[$order->status];
                @endphp
                <h6 class="{{ $st['class'] }} fw-bold mb-2">{{ $st['text'] }}</h6>
                <p>
                    @if($order->status == 'bayar')
                        Pesanan Anda sedang diproses. Mohon tunggu, buku akan segera dikirim.
                    @elseif($order->status == 'selesai')
                        Pesanan Anda telah selesai diproses dan buku telah dikirim.
                    @elseif($order->status == 'batal')
                        Pesanan ini telah dibatalkan.
                    @endif
                </p>
            @endif

        </div>
    </div>
</div>

<style>
    /* Background gradient lembut biru-putih */
    .payment-page {
        background: linear-gradient(to bottom, #e7f8ff, #ffffff);
        padding: 20px;
    }

    body {
        font-family: 'Segoe UI', sans-serif;
    }

    .qr-box {
        display: inline-block;
        padding: 20px;
        background-color: #f0f8ff;
        border-radius: 12px;
        margin-bottom: 20px;
    }

    .list-group-item {
        background: #fff;
        border-color: #dee2e6;
        color: #212529;
    }

    .list-group-item:nth-child(even) {
        background-color: #f9fbff;
    }

    .decor-left, .decor-right {
        position: absolute;
        top: 50px;
        width: 120px;
        height: 200px;
        background: url('https://img.icons8.com/ios/100/0d6efd/book.png') no-repeat center center;
        background-size: contain;
        opacity: 0.1;
    }

    .decor-left { left: 30px; transform: rotate(-15deg); }
    .decor-right { right: 30px; transform: rotate(15deg); }
</style>
@endsection
