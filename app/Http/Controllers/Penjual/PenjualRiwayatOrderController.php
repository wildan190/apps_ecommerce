<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Order; // Sesuaikan dengan model order Anda

class PenjualRiwayatOrderController extends Controller
{
    public function index()
    {
        // Ambil daftar order yang telah dikonfirmasi (misalnya, dengan status "dikonfirmasi")
        $confirmedOrders = Order::where('status', 'dikonfirmasi')->get();

        return view('penjual.orders.riwayat', compact('confirmedOrders'));
    }
}

