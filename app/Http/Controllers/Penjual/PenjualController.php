<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;

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

    public function show(Order $order)
    {
        // Lakukan logika untuk menampilkan detail pesanan di sini

        return view('penjual.orders.show', compact('order'));
    }

    public function cetakInvoice($orderId)
    {
        $order = Order::find($orderId);
        $subtotal = 0;

        // Hitung subtotal
        foreach ($order->orderItems as $item) {
            $subtotal += $item->jumlah * $item->product->harga_produk;
        }

        $taxRate = 0.1; // 10% pajak (Anda bisa menyesuaikan dengan tarif pajak yang sesuai)
        $tax = $subtotal * $taxRate;
        $total = $subtotal + $tax;

        // Generate PDF invoice
        $pdf = PDF::loadView('penjual.invoice', compact('order', 'subtotal', 'tax', 'total'));

        // Cetak invoice
        return $pdf->download('invoice-' . $order->id . '.pdf');
    }
}
