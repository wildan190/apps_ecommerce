<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data order yang telah dikonfirmasi
        $confirmedOrders = Order::where('status', 'dikonfirmasi')->get();

        return view('admin.orders.index', compact('confirmedOrders'));
    }

    public function show($id)
    {
        // Ambil detail pesanan berdasarkan ID
        $order = Order::findOrFail($id);

        // Pastikan pesanan telah dikonfirmasi
        if ($order->status !== 'dikonfirmasi') {
            return redirect()->route('admin.orders.index')->with('error', 'Pesanan belum dikonfirmasi.');
        }

        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        // Hapus pesanan
        $order->delete();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Pesanan berhasil dihapus.');
    }


    /*public function filter(Request $request)
    {
        // Validasi input
        $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'order_id' => 'nullable|integer',
        ]);

        // Query berdasarkan filter
        $query = Order::where('status', 'confirmed');

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->input('end_date'));
        }

        if ($request->filled('order_id')) {
            $query->where('id', $request->input('order_id'));
        }

        $confirmedOrders = $query->get();

        return view('admin.orders.index', compact('confirmedOrders'));
    }*/
}
