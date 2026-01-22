<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class AdminController extends Controller
{
    // Halaman dashboard admin
    public function index()
    {
        $buku = Buku::all();
        return view('admin.dashboard', compact('buku'));
    }

    // Tampilkan form tambah buku
    public function create()
    {
        return view('admin.create'); // buat file baru resources/views/admin/buku/create.blade.php
    }

    // Simpan buku baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:pendidikan,olahraga,fiksi,desain',
            'sampul' => 'nullable|string|max:255',
            'penulis' => 'nullable|string|max:255',
            'penerbit' => 'nullable|string|max:255',
            'sinopsis' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        Buku::create($request->all());

        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    // Hapus buku
    //public function hapusBuku($id)
    //{
        //$buku = Buku::findOrFail($id);
        //$buku->delete();

        //return redirect()->back()->with('success', 'Buku berhasil dihapus!');
    //}

    // Halaman edit buku (nanti)
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('admin.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'    => 'required',
            'kategori' => 'required|in:pendidikan,olahraga,fiksi,desain',
            'harga'    => 'required|numeric',
            'stok'     => 'required|integer',
        ]);

        $buku = Buku::findOrFail($id);

        $buku->update([
            'judul'     => $request->judul,
            'kategori'  => $request->kategori,
            'penulis'   => $request->penulis,
            'penerbit'  => $request->penerbit,
            'sinopsis'  => $request->sinopsis,
            'harga'     => $request->harga,
            'stok'      => $request->stok,
            'sampul'    => $request->sampul, // hanya nama file
        ]);

        return redirect('/admin')->with('success', 'Buku berhasil diperbarui');
    }

    // Hapus buku
    public function destroy($id)
    {
        Buku::destroy($id);
        return redirect('/admin')->with('success', 'Buku berhasil dihapus');
    }
    
}
