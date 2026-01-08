<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku; // Model Buku

class KategoriController extends Controller
{
    public function index()
    {
        // Ambil kategori unik
        $kategoris = Buku::select('kategori')->distinct()->get();
        
        // Ambil semua buku berdasarkan kategori
        $buku = Buku::all();

        // Kirim data kategori dan buku ke view
        return view('kategori', compact('kategoris', 'buku'));
    }
}
