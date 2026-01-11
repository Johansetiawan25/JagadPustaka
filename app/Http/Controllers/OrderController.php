<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
     public function index()
    {
        $orders = Order::with('user')->get();
        return view('admin.orders', compact('orders'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,bayar,selesai',
        ]);

        // Hanya izinkan status yang valid untuk diubah
        if($order->status != 'selesai') {
            $order->status = $request->status;
            $order->save();
            return redirect()->back()->with('success', 'Status order berhasil diubah!');
        }

        return redirect()->back()->with('success', 'Status order tidak bisa diubah karena sudah selesai.');
    }
}
