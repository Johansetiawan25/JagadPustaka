<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status'); // ambil status dari URL

        $orders = Order::with('user')
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.orders', compact('orders', 'status'));
    }


    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,bayar,selesai,batal',
        ]);

        $allowedChanges = [
            'pending' => ['bayar', 'batal'],
            'bayar'   => ['selesai'],
        ];

        if (
            !isset($allowedChanges[$order->status]) ||
            !in_array($request->status, $allowedChanges[$order->status])
        ) {
            return redirect()->back()->with('error', 'Status tidak bisa diubah.');
        }

        DB::transaction(function () use ($order, $request) {

            // 🔁 KEMBALIKAN STOK JIKA DIBATALKAN
            if ($order->status === 'pending' && $request->status === 'batal') {

                // PENTING: pastikan relasi benar
                $order->load('items.buku');

                foreach ($order->items as $item) {
                    $item->buku->increment('stok', $item->qty);
                }
            }

            $order->update([
                'status' => $request->status
            ]);
        });

        return redirect()->back()->with('success', 'Status order berhasil diperbarui.');
    }

    public function payment(Order $order)
    {
        $order->load('items.buku'); // ambil item order

        $isPending = $order->status === 'pending';
        $isBayar   = $order->status === 'bayar';
        $isSelesai = $order->status === 'selesai';
        $isBatal   = $order->status === 'batal';

        return view('checkout.qris', compact('order','isPending','isBayar','isSelesai','isBatal'));

    }


    
}
