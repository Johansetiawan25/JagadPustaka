<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

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

        // Tentukan status yang bisa diubah
        $allowedChanges = [
            'pending' => ['bayar','batal'],
            'bayar' => ['selesai'],
        ];

        if(isset($allowedChanges[$order->status]) && in_array($request->status, $allowedChanges[$order->status])) {
            $order->status = $request->status;
            $order->save();
            return redirect()->back()->with('success', 'Status order berhasil diubah!');
        }

        return redirect()->back()->with('success', 'Status order tidak bisa diubah.');
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
