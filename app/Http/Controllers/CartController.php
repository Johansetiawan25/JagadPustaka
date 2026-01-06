<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        // contoh data produk (nanti dari database)
        $produk = [
            'id' => $id,
            'nama' => 'Sepatu',
            'harga' => 200000,
            'foto' => 'sepatu.jpg'
        ];

        $cart = session()->get('cart', []);
//ini percobaan komen
//ini kerjaan kelompok final projek jagad pustaka 
        if (isset($cart[$id])) {
            // kalau produk sudah ada → tambah qty
            $cart[$id]['qty']++;
        } else {
            // produk baru
            $cart[$id] = [
                'nama' => $produk['nama'],
                'harga' => $produk['harga'],
                'qty' => 1,
                'foto' => $produk['foto']
            ];
        }

        session()->put('cart', $cart);

        return redirect('/keranjang');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('keranjang', compact('cart'));
    }
}
