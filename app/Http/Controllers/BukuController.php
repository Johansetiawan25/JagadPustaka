<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku; // pastikan model Buku ada

class BukuController extends Controller
{
    public function pendidikan()
    {
        // Ambil semua buku dengan kategori 'pendidikan'
        $buku = Buku::where('kategori', 'pendidikan')->get();

        // Kirim ke view
        return view('kategori.pendidikan', compact('buku'));
    }

    public function olahraga()
    {
        $buku = Buku::where('kategori', 'olahraga')->get();
        return view('kategori.olahraga', compact('buku'));
    }

    public function fiksi()
    {
        $buku = Buku::where('kategori', 'fiksi')->get();
        return view('kategori.fiksi', compact('buku'));
    }

    public function desain()
    {
        $buku = Buku::where('kategori', 'desain')->get();
        return view('kategori.desain', compact('buku'));
    }
}
