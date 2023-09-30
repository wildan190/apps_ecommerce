<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class PenjualController extends Controller
{
    public function orders()
    {
        // Dapatkan daftar pesanan yang perlu dikonfirmasi
        $orders = Order::where('status', 'pending')->with('orderItems.product')->get();

        return view('penjual.orders.index', compact('orders'));
    }

    public function confirmOrder(Order $order)
    {
        // Ubah status pesanan menjadi 'confirmed' atau sesuai kebutuhan
        $order->update(['status' => 'Dikonfirmasi']);

        // Setelah mengubah status, Anda dapat mengarahkan pengguna kembali ke halaman manajemen pesanan
        return redirect()->route('penjual.orders')->with('success', 'Pesanan telah dikonfirmasi.');
    }
}
