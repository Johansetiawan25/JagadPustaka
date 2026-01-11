@extends('layout.admin')

@section('title', 'Tambah Buku')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Tambah Buku Baru</h2>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.buku.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="block font-medium">Judul</label>
            <input type="text" name="judul" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-3">
            <label class="block font-medium">Kategori</label>
            <select name="kategori" class="w-full border rounded p-2" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="pendidikan">Pendidikan</option>
                <option value="olahraga">Olahraga</option>
                <option value="fiksi">Fiksi</option>
                <option value="desain">Desain</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="block font-medium">Sampul (nama file saja)</label>
            <input type="text" name="sampul" class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label class="block font-medium">Penulis</label>
            <input type="text" name="penulis" class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label class="block font-medium">Penerbit</label>
            <input type="text" name="penerbit" class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label class="block font-medium">Sinopsis</label>
            <textarea name="sinopsis" class="w-full border rounded p-2"></textarea>
        </div>

        <div class="mb-3">
            <label class="block font-medium">Harga</label>
            <input type="number" name="harga" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-3">
            <label class="block font-medium">Stok</label>
            <input type="number" name="stok" class="w-full border rounded p-2" required>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Tambah Buku</button>
    </form>
</div>
@endsection
