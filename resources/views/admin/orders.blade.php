@extends('layout.admin')

@section('title', 'Daftar Order')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Daftar Order</h2>

    @if(session('success'))
        <div class="mb-4 p-2 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex gap-2 mb-4">
    <a href="{{ route('orders.index') }}"
       class="px-4 py-2 rounded {{ empty($status) ? 'bg-gray-800 text-white' : 'bg-gray-200' }}">
        Semua
    </a>

    <a href="{{ route('orders.index', ['status' => 'pending']) }}"
       class="px-4 py-2 rounded {{ ($status ?? '') == 'pending' ? 'bg-yellow-500 text-white' : 'bg-gray-200' }}">
        Pending
    </a>

    <a href="{{ route('orders.index', ['status' => 'bayar']) }}"
       class="px-4 py-2 rounded {{ ($status ?? '') == 'bayar' ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">
        Bayar
    </a>

    <a href="{{ route('orders.index', ['status' => 'selesai']) }}"
       class="px-4 py-2 rounded {{ ($status ?? '') == 'selesai' ? 'bg-green-500 text-white' : 'bg-gray-200' }}">
        Selesai
    </a>

    <a href="{{ route('orders.index', ['status' => 'batal']) }}"
       class="px-4 py-2 rounded {{ ($status ?? '') == 'batal' ? 'bg-red-500 text-white' : 'bg-gray-200' }}">
        Batal
    </a>
</div>

    <table class="table-auto w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Tanggal</th>
                <th class="border px-4 py-2">Kode Pembelian</th>
                <th class="border px-4 py-2">User</th>
                <th class="border px-4 py-2">Total Harga</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2 text-sm">{{ $order->created_at->format('d-m-Y H:i') }}</td>
                    <td class="border px-4 py-2">{{ $order->id }}</td>
                    <td class="border px-4 py-2">{{ $order->user->name ?? 'User Tidak Ditemukan' }}</td>
                    <td class="border px-4 py-2">Rp{{ number_format($order->total_harga, 0, ',', '.') }}</td>
                    <td class="border px-4 py-2">
                        @if($order->status == 'pending')
                            <span class="text-yellow-600 font-bold">Pending</span>
                        @elseif($order->status == 'bayar')
                            <span class="text-blue-600 font-bold">Bayar</span>
                        @elseif($order->status == 'selesai')
                            <span class="text-green-600 font-bold">Selesai</span>
                        @else
                            <span class="text-red-600 font-bold">Batal</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        @if($order->status == 'pending')
                            <form action="{{ route('orders.update', $order->id) }}" method="POST" class="flex gap-2">
                                @csrf
                                @method('PUT')
                                <button name="status" value="bayar" class="px-2 py-1 bg-blue-500 text-white rounded">Bayar</button>
                                <button name="status" value="batal" class="px-2 py-1 bg-red-500 text-white rounded">Batal</button>
                            </form>
                        @elseif($order->status == 'bayar')
                            <form action="{{ route('orders.update', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button name="status" value="selesai" class="px-2 py-1 bg-green-500 text-white rounded">Selesai</button>
                            </form>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
