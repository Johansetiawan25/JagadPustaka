<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

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

    public function checkout(Request $request)
{
    $cart = session()->get('cart', []);

    // Ambil array buku yang dicentang
    $selected = $request->input('selected', []); // default [] jika kosong

    // Filter cart sesuai yang dicentang
    $cartSelected = array_filter($cart, function($itemId) use ($selected) {
        return in_array($itemId, $selected);
    }, ARRAY_FILTER_USE_KEY);

    // 1. cek jika kosong
    if (!$cartSelected || count($cartSelected) === 0) {
        return redirect('/keranjang')->with('error', 'Tidak ada item yang dipilih untuk checkout');
    }

    // 2. hitung total harga
    $total = 0;
    foreach ($cartSelected as $item) {
        $total += $item['harga'] * $item['qty'];
    }

    // 3. simpan ke tabel orders
    $orderId = DB::table('orders')->insertGetId([
        'user_id' => auth()->id(),
        'total_harga' => $total,
        'status' => 'pending',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // 4. simpan ke tabel order_items
    foreach ($cartSelected as $buku_id => $item) {
        DB::table('order_items')->insert([
            'order_id' => $orderId,
            'buku_id' => $buku_id,
            'qty' => $item['qty'],
            'harga' => $item['harga'],
            'subtotal' => $item['harga'] * $item['qty'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    // 5. hapus item yang dicentang dari cart
    foreach ($selected as $id) {
        unset($cart[$id]);
    }
    session()->put('cart', $cart);

    // 6. redirect ke WA
    $pesan = "Halo, saya ingin memesan:%0A%0A";
    foreach ($cartSelected as $item) {
        $pesan .= "- {$item['nama']} x{$item['qty']} = Rp" .
            number_format($item['harga'] * $item['qty'], 0, ',', '.') . "%0A";
    }
    $pesan .= "%0ATotal: Rp" . number_format($total, 0, ',', '.');

    $noWa = "6281234567890"; // ganti dengan nomor admin
    return redirect("https://wa.me/{$noWa}?text={$pesan}");
}


    public function index()
    {
        $cart = session()->get('cart', []);
        return view('keranjang', compact('cart'));
    }
}
