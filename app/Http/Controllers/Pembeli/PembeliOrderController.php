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
}
