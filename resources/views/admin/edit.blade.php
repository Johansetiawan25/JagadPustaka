@extends('layout.admin')

@section('title', 'Edit Buku')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Buku</h2>

<form action="{{ url('/admin/buku/'.$buku->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label>Judul</label>
        <input type="text" name="judul" value="{{ $buku->judul }}" class="w-full border p-2">
    </div>

    <div>
        <label>Kategori</label>
        <select name="kategori" class="w-full border p-2">
            @foreach(['pendidikan','olahraga','fiksi','desain'] as $k)
                <option value="{{ $k }}" {{ $buku->kategori==$k?'selected':'' }}>
                    {{ ucfirst($k) }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Penulis</label>
        <input type="text" name="penulis" value="{{ $buku->penulis }}" class="w-full border p-2">
    </div>

    <div>
        <label>Penerbit</label>
        <input type="text" name="penerbit" value="{{ $buku->penerbit }}" class="w-full border p-2">
    </div>

    <div>
        <label>Harga</label>
        <input type="number" step="0.01" name="harga" value="{{ $buku->harga }}" class="w-full border p-2">
    </div>

    <div>
        <label>Stok</label>
        <input type="number" name="stok" value="{{ $buku->stok }}" class="w-full border p-2">
    </div>

    <div>
        <label>Sampul (nama file saja)</label>
        <input type="text" name="sampul" value="{{ $buku->sampul }}" class="w-full border p-2">
    </div>

    <div>
        <label>Sinopsis</label>
        <textarea name="sinopsis" class="w-full border p-2">{{ $buku->sinopsis }}</textarea>
    </div>

    <button class="bg-indigo-600 text-white px-4 py-2 rounded">
        Simpan Perubahan
    </button>
</form>
@endsection
