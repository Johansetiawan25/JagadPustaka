<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;


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

    public function terlaris()
    {
        $buku = DB::table('buku')
            ->leftJoin('order_items', 'buku.id', '=', 'order_items.buku_id')
            ->select(
                'buku.id',
                'buku.judul',
                'buku.sampul',
                'buku.harga',
                DB::raw('COALESCE(SUM(order_items.qty), 0) as total_terjual')
            )
            ->groupBy('buku.id', 'buku.judul', 'buku.sampul', 'buku.harga')
            ->orderByDesc('total_terjual')
            ->limit(12)
            ->get();

        return view('home', compact('buku'));
    }


}
