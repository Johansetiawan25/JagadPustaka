@extends('layout.app')

@section('title', 'Keranjang')

@section('content')
<div class="container mt-4">
    <h3>Keranjang Belanja</h3>

    @if(empty($cart))
        <p>Keranjang kosong</p>
    @else

    {{-- Hitung total server-side --}}
    @php
        $total = 0;
        foreach($cart as $item) {
            $total += $item['harga'] * $item['qty'];
        }
    @endphp

    {{-- FORM CHECKOUT --}}
    <form action="/checkout-wa" method="POST">
        @csrf

        <div class="row">
            @foreach($cart as $id => $item)
            <div class="col-12 mb-3">
                <div class="card shadow-sm">
                    <div class="row g-0 align-items-center">

                        {{-- Checkbox --}}
                        <div class="col-auto text-center p-2">
                            <input type="checkbox"
                                   name="selected[]"
                                   value="{{ $id }}"
                                   class="form-check-input item-checkbox"
                                   checked>
                        </div>

                        {{-- Gambar --}}
                        <div class="col-md-3 text-center p-2">
                            <img src="{{ asset('storage/img/' . $item['foto']) }}"
                                 class="img-fluid rounded"
                                 alt="{{ $item['nama'] }}">
                        </div>

                        {{-- Detail --}}
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5>{{ $item['nama'] }}</h5>
                                <p class="text-danger fw-bold">
                                    Rp{{ number_format($item['harga'],0,',','.') }}
                                </p>

                                {{-- Tombol − qty + 🗑 sejajar --}}
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <a href="/keranjang/hapus/{{ $id }}" class="btn btn-sm btn-danger">&#x1F5D1</a>
                                    <a href="/keranjang/kurang/{{ $id }}" class="btn btn-sm btn-outline-secondary">−</a>
                                    <span class="fw-bold">{{ $item['qty'] }}</span>
                                    <a href="/keranjang/tambah/{{ $id }}" class="btn btn-sm btn-outline-secondary">+</a>
                                </div>

                                <p class="card-text">
                                    Subtotal:
                                    <span class="fw-bold item-subtotal"
                                          data-harga="{{ $item['harga'] }}"
                                          data-qty="{{ $item['qty'] }}">
                                        Rp{{ number_format($item['harga'] * $item['qty'],0,',','.') }}
                                    </span>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- RINGKASAN --}}
        <div class="card shadow mt-4">
            <div class="card-body">
                <h5>Ringkasan Belanja</h5>
                <hr>
                <p>Total Harga:
                    <span id="total-harga" class="fw-bold">Rp {{ number_format($total,0,',','.') }}</span>
                </p>
                <button type="submit" class="btn btn-success w-100" @if($total <= 0) disabled @endif>
                    Checkout
                </button>
            </div>
        </div>

    </form>
    @endif
</div>
@endsection

{{-- SCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.item-checkbox');
    const totalEl = document.getElementById('total-harga');
    const checkoutBtn = document.querySelector('button[type="submit"]');

    function updateTotal() {
        let total = 0;

        checkboxes.forEach(cb => {
            if (cb.checked) {
                const card = cb.closest('.card');
                const subtotalEl = card.querySelector('.item-subtotal');
                const harga = parseInt(subtotalEl.dataset.harga);
                const qty = parseInt(subtotalEl.dataset.qty);
                total += harga * qty;
            }
        });

        totalEl.textContent = 'Rp ' + total.toLocaleString('id-ID');

        // Disable checkout jika total 0
        checkoutBtn.disabled = (total === 0);
    }

    checkboxes.forEach(cb => {
        cb.addEventListener('change', updateTotal);
    });

    // Inisialisasi saat load
    updateTotal();
});
</script>
