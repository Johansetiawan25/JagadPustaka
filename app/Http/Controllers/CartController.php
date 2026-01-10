<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        // ambil produk dari database
        $produk = Buku::find($id);

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // kalau produk sudah ada → tambah qty
            $cart[$id]['qty']++;
        } else {
            // produk baru
            $cart[$id] = [
                'nama' => $produk->judul,
                'harga' => $produk->harga,
                'qty' => 1,
                'foto' => $produk->sampul, // kolom sampul dari db
            ];
        }

        session()->put('cart', $cart);

        return redirect('/keranjang');
    }

    public function kurang($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['qty']--;
            if($cart[$id]['qty'] <= 0) {
                unset($cart[$id]); // hapus item jika qty <= 0
            }
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    public function hapus($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('keranjang', compact('cart'));
    }
}
