@extends('layout.app')

@section('title', 'Keranjang')

@section('content')
<div class="container mt-4">
    <h3>Keranjang Belanja</h3>

    @if(empty($cart))
        <p>Keranjang kosong</p>
    @else
        <div class="row">
            @php $total = 0; @endphp

            @foreach($cart as $id => $item)
                @php
                    $subtotal = $item['qty'] * $item['harga'];
                    $total += $subtotal;
                @endphp

                <div class="col-12 mb-3">
            <div class="card shadow-sm">
                <div class="row g-0 align-items-center">
                    
                    <!-- Checkbox di kiri -->
                    <div class="col-auto text-center p-2">
                        <input type="checkbox" name="selected[]" value="{{ $id }}" class="form-check-input item-checkbox" checked>

                    </div>

                    <!-- Gambar produk -->
                    <div class="col-md-3 text-center p-2">
                        <img src="{{ asset('storage/img/' . $item['foto']) }}" class="img-fluid rounded" alt="{{ $item['nama'] }}">
                    </div>

                    <!-- Detail produk -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['nama'] }}</h5>
                            <p class="card-text text-danger fw-bold">Rp{{ number_format($item['harga'],0,',','.') }}</p>

                            <div class="d-flex align-items-center mb-2">
                                <!-- Tombol kurang -->
                                <form action="/keranjang/kurang/{{ $id }}" method="POST" class="me-2">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">-</button>
                                </form>

                                <!-- Qty -->
                                <span class="mx-2">{{ $item['qty'] }}</span>

                                <!-- Tombol tambah -->
                                <form action="/keranjang/tambah/{{ $id }}" method="POST" class="ms-2">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">+</button>
                                </form>

                                <!-- Tombol hapus -->
                                <form action="/keranjang/hapus/{{ $id }}" method="POST" class="ms-3">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                            <!-- Di card-body -->
<p class="card-text">Subtotal: <span class="fw-bold item-subtotal" 
      data-harga="{{ $item['harga'] }}" 
      data-qty="{{ $item['qty'] }}">Rp{{ number_format($item['harga'] * $item['qty'],0,',','.') }}</span></p>


                        </div>
                    </div>
                </div>
            </div>
        </div>


            @endforeach
        </div>

        <form action="/checkout-wa" method="POST">
            @csrf

            <div class="row">
                @foreach($cart as $id => $item)
                    <div class="col-12 mb-3">
                        <div class="card shadow-sm">
                            <div class="row g-0 align-items-center">
                                <!-- konten card nanti -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- ringkasan total dan tombol checkout -->
            <div class="card shadow mt-4">
                <div class="card-body">
                    <h5>Ringkasan Belanja</h5>
                    <hr>
                    <p>Total Harga: <span id="total-harga" class="fw-bold">Rp {{ number_format($total,0,',','.') }}</span></p>

                    <button type="submit" class="btn btn-success w-100">Checkout</button>
                </div>
            </div>
        </form>


    @endif
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.item-checkbox');
    const totalEl = document.getElementById('total-harga');

    function updateTotal() {
        let total = 0;
        checkboxes.forEach(cb => {
            if(cb.checked) {
                const card = cb.closest('.card');
                const subtotalEl = card.querySelector('.item-subtotal');
                const harga = parseInt(subtotalEl.dataset.harga);
                const qty = parseInt(subtotalEl.dataset.qty);
                total += harga * qty;
            }
        });
        totalEl.textContent = 'Rp ' + total.toLocaleString('id-ID');
    }

    checkboxes.forEach(cb => {
        cb.addEventListener('change', updateTotal);
    });

    // inisialisasi saat load
    updateTotal();
});
</script>
