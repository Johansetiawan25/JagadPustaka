@extends('layout.app')

@section('title', 'Keranjang')

@section('content')
<div class="container mt-4">

    {{-- HEADER --}}
    <div class="row mb-3">
        <div class="col-12">
            <h2 class="fw-bold">Keranjang Belanja</h2>
        </div>
    </div>

    {{-- CARD PILIH SEMUA + HAPUS SEMUA --}}
    @if(!empty($cart))
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    {{-- Pilih Semua --}}
                    <div class="form-check mb-0">
                        <input type="checkbox" class="form-check-input" id="select-all">
                        <label class="form-check-label fw-bold" for="select-all">Semua</label>
                    </div>

                    {{-- Hapus Semua --}}
                    <form action="{{ route('cart.hapusSemua') }}" method="POST" id="form-hapus-all">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center gap-1" id="hapus-all">
                            <i class="bi bi-trash3"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif


    {{-- PESAN --}}
    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(empty($cart))
    <div class="d-flex justify-content-center align-items-center" style="height: 350px; gap: 30px;">

        {{-- FOTO DI KIRI --}}
        <div class="col-auto">
            <img src="{{ asset('storage/img/sampahh.jpeg') }}"
                alt="Keranjang Kosong"
                style="width: 250px; max-width: 100%;">
        </div>

        {{-- TEKS DI KANAN --}}
        <div class="col text-start">
            <h3 class="fw-bold">Keranjang Kamu masih Kosong</h3>
            <p class="text-muted mb-3">
                Kami punya banyak buku yang siap memberi kamu kebahagiaan lho.......<br>
                Yuk, belanja sekarang!
            </p>
            <a href="{{ url('/kategori') }}" class="btn btn-primary btn-lg">
                Mulai Belanja
            </a>
        </div>

    </div>
    @else
    {{-- Hitung total server-side --}}
    @php
    $total = 0;
    foreach($cart as $item) {
    $total += $item['harga'] * $item['qty'];
    }
    @endphp

    {{-- FORM CHECKOUT --}}
    <form action="{{ route('cart.checkout') }}" method="POST">
        @csrf

        <div class="row">
            @foreach($cart as $id => $item)
            <div class="col-12 mb-2">
                <div class="card shadow-sm p-2">
                    <div class="d-flex align-items-center">

                        {{-- Checkbox item --}}
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
                                class="img-thumbnail"
                                style="width: 150px;"
                                alt="{{ $item['nama'] }}">
                        </div>

                        {{-- Detail --}}
                        <div class="col-md-8">
                            <div class="card-body d-flex flex-column h-100">
                                <h5>{{ $item['nama'] }}</h5>
                                <p class="text-danger fw-bold mb-2">
                                    Rp{{ number_format($item['harga'],0,',','.') }}
                                </p>

                                {{-- Tombol − qty + --}}
                                <div class="d-flex align-items-center gap-2 mb-2 mt-auto">
                                    <a href="/keranjang/hapus/{{ $id }}" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                    <a href="/keranjang/kurang/{{ $id }}" class="btn btn-sm btn-outline-secondary">−</a>
                                    <span class="fw-bold">{{ $item['qty'] }}</span>
                                    <a href="{{ route('cart.tambahQty', $id) }}" class="btn btn-sm btn-outline-secondary">+</a>

                                </div>

                                <p class="card-text mt-2">
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
                <button type="submit" class="btn btn-primary w-100" @if($total <=0) disabled @endif>
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
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.item-checkbox');
        const totalEl = document.getElementById('total-harga');
        const checkoutBtn = document.querySelector('button[type="submit"]:not(#hapus-all)');
        const selectAll = document.getElementById('select-all');
        const hapusAllBtn = document.getElementById('hapus-all');

        // fungsi update total
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
            checkoutBtn.disabled = (total === 0);
        }

        // event checkbox item
        checkboxes.forEach(cb => {
            cb.addEventListener('change', function() {
                updateTotal();
                if (selectAll) selectAll.checked = Array.from(checkboxes).every(c => c.checked);
            });
        });

        // event select-all
        if (selectAll) {
            selectAll.addEventListener('change', function() {
                checkboxes.forEach(cb => cb.checked = selectAll.checked);
                updateTotal();
            });
        }

        // hapus all
        if (hapusAllBtn) {
            hapusAllBtn.addEventListener('click', function(e) {
                e.preventDefault(); // hentikan submit default

                const anyChecked = Array.from(checkboxes).some(cb => cb.checked);
                if (!anyChecked) {
                    alert('Tidak ada Buku yang dipilih untuk dihapus!');
                    return;
                }

                if (!confirm('Yakin ingin menghapus semua Buku yang dipilih?')) return;

                const form = document.getElementById('form-hapus-all');

                // hapus input hidden lama
                form.querySelectorAll('input[name="selected[]"]').forEach(i => i.remove());

                // copy checkbox diceklis ke form
                checkboxes.forEach(cb => {
                    if (cb.checked) {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'selected[]';
                        input.value = cb.value;
                        form.appendChild(input);
                    }
                });

                // submit form manual
                form.submit();
            });
        }

        // inisialisasi
        updateTotal();
    });
</script>