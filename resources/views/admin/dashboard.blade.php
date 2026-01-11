@extends('layout.admin')

@section('title', 'Manajemen Buku')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Manajemen Buku</h2>

    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3">NO</th>
                    <th class="px-4 py-3">Sampul</th>
                    <th class="px-4 py-3">Judul</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Penulis</th>
                    <th class="px-4 py-3">Penerbit</th>
                    <th class="px-4 py-3">Harga</th>
                    <th class="px-4 py-3">Stok</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($buku as $b)
                <tr class="border-t">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>

                    <!-- Sampul (nama file dari DB) -->
                    <td class="px-4 py-3">
                        <img src="{{ $b->sampul 
                            ? asset('storage/img/'.$b->sampul) 
                            : asset('storage/img/default.png') }}"
                             class="w-12 h-16 object-cover rounded">
                    </td>

                    <td class="px-4 py-3">{{ $b->judul }}</td>
                    <td class="px-4 py-3 capitalize">{{ $b->kategori }}</td>
                    <td class="px-4 py-3">{{ $b->penulis ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $b->penerbit ?? '-' }}</td>
                    <td class="px-4 py-3">
                        Rp{{ number_format($b->harga,0,',','.') }}
                    </td>
                    <td class="px-4 py-3">{{ $b->stok }}</td>

                    <!-- Aksi -->
                    <td class="px-4 py-3 text-center">
                        <div class="flex gap-2 justify-center">
                            <!-- EDIT -->
                            <a href="{{ url('/admin/buku/'.$b->id.'/edit') }}"
                               class="px-3 py-1 text-xs bg-yellow-400 text-white rounded">
                                Edit
                            </a>

                            <!-- HAPUS -->
                            <form action="{{ url('/admin/buku/'.$b->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin hapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-3 py-1 text-xs bg-red-600 text-white rounded">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-4 py-6 text-center text-gray-500">
                        Belum ada data buku
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
