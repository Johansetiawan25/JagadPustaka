<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;



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

        return redirect()->back()->with('success', 'Berhasil ditambahkan ke keranjang.');
    }

    public function kurang($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']--;
            if ($cart[$id]['qty'] <= 0) {
                unset($cart[$id]); // hapus item jika qty <= 0
            }
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    public function hapus($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    public function checkout(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login dulu');
        }

        $cart = session()->get('cart', []);
        $selected = $request->input('selected', []);

        // Filter cart sesuai checkbox
        $cartSelected = array_filter($cart, function ($itemId) use ($selected) {
            return in_array($itemId, $selected);
        }, ARRAY_FILTER_USE_KEY);

        if (empty($cartSelected)) {
            return redirect('/keranjang')
                ->with('error', 'Tidak ada item yang dipilih untuk checkout');
        }

        // Hitung total
        $total = 0;
        foreach ($cartSelected as $item) {
            $total += $item['harga'] * $item['qty'];
        }


        $order = null;

        try {
            DB::transaction(function () use ($cartSelected, $total, &$order) {

                foreach ($cartSelected as $buku_id => $item) {
                    $buku = Buku::lockForUpdate()->find($buku_id);

                    if (!$buku || $buku->stok < $item['qty']) {
                        throw new \Exception(
                            "Stok buku '{$buku->judul}' tidak mencukupi."
                        );
                    }
                }

                $order = Order::create([
                    'user_id' => Auth::id(),
                    'total_harga' => $total,
                    'status' => 'pending',
                ]);

                foreach ($cartSelected as $buku_id => $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'buku_id' => $buku_id,
                        'qty' => $item['qty'],
                        'harga' => $item['harga'],
                        'subtotal' => $item['harga'] * $item['qty'],
                    ]);

                    Buku::where('id', $buku_id)
                        ->decrement('stok', $item['qty']);
                }
            });
        } catch (\Exception $e) {
            return redirect('/keranjang')->with('error', $e->getMessage());
        }

        if (!$order) {
            return redirect('/keranjang')->with('error', 'Order gagal dibuat');
        }

        return redirect()->route('payment.qris', $order->id);
    }


    public function index()
    {
        $cart = session()->get('cart', []);
        return view('keranjang', compact('cart'));
    }

    public function hapusSemua(Request $request)
    {
        // ambil item yang diceklis dari form
        $selected = $request->input('selected', []);

        if (empty($selected)) {
            return redirect()->back()->with('error', 'Tidak ada item yang dipilih untuk dihapus!');
        }

        // ambil cart dari session
        $cart = session()->get('cart', []);

        // hapus item yang diceklis
        foreach ($selected as $id) {
            if (isset($cart[$id])) {
                unset($cart[$id]);
            }
        }

        // update session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Item berhasil dihapus!');
    }

    public function tambahQty($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        }

        session()->put('cart', $cart);

        // Tidak ada with('success'), jadi notif tidak muncul
        return redirect()->back();
    }
}
