@extends('layout.admin')

@section('title', 'Daftar Orders')

@section('content')
<div class="p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Orders</h1>

    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
    </div>
    @endif

    @php
        $statusGroups = ['pending', 'bayar', 'selesai'];
    @endphp

    @foreach($statusGroups as $status)
        <h2 class="text-xl font-semibold mt-6 mb-2 capitalize">{{ $status }}</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">Key</th>
                        <th class="border px-4 py-2">User</th>
                        <th class="border px-4 py-2">Total Harga</th>
                        <th class="border px-4 py-2">Status</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders->where('status', $status) as $order)
                    <tr>
                        <td class="border px-4 py-2">{{ $order->id }}</td>
                        <td class="border px-4 py-2">{{ $order->user->name ?? 'Tidak Diketahui' }}</td>
                        <td class="border px-4 py-2">Rp{{ number_format($order->total_harga, 0, ',', '.') }}</td>
                        <td class="border px-4 py-2 capitalize">{{ $order->status }}</td>
                        <td class="border px-4 py-2">
                            @if($order->status == 'pending')
                                <form action="{{ route('orders.update', $order->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="bayar">
                                    <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">
                                        Ubah ke Bayar
                                    </button>
                                </form>
                            @elseif($order->status == 'bayar')
                                <form action="{{ route('orders.update', $order->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="selesai">
                                    <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded">
                                        Ubah ke Selesai
                                    </button>
                                </form>
                            @else
                                <span class="text-gray-500">Sudah selesai</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="border px-4 py-2 text-center" colspan="5">Belum ada order</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endforeach
</div>
@endsection
