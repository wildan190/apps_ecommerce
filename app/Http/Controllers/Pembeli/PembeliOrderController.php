<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class PembeliOrderController extends Controller
{
    //public function index()
    public function index()
    {
        // Ambil data pesanan untuk pembeli saat ini
        $orders = Order::where('user_id', auth()->user()->id)
            ->with('orderItems') // Eager load item pesanan
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pembeli.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('orderItems.product')->find($id); // Eager load item pesanan dan produk terkait
        // Calculate tax (assuming 10% tax rate)
        // Calculate subtotal (total price of products in the order)
        $subtotal = $order->orderItems->sum(function ($item) {
            return $item->quantity * $item->product->harga_produk;
        });

        // Calculate tax (assuming 10% tax rate)
        $tax = $subtotal * 0.1;

        return view('pembeli.orders.show', compact('order', 'subtotal', 'tax'));
    }
}
