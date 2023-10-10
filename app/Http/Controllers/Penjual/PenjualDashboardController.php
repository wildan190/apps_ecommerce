<?php

// app/Http/Controllers/PenjualDashboardController.php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use ConsoleTVs\Charts\Facades\Charts;
//use Chart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;



class PenjualDashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah pesanan yang belum dikonfirmasi
        $unconfirmedOrdersCount = Order::where('status', 'pending')->count();

        // Menghitung jumlah pesanan yang telah dikonfirmasi
        $confirmedOrdersCount = Order::where('status', 'dikonfirmasi')->count();

        // Mengambil data pendapatan dari basis data
        $revenueData = DB::table('order_items')
            ->select(DB::raw("DATE(created_at) as tanggal"), DB::raw("SUM(jumlah * harga) as pendapatan"))
            ->groupBy('tanggal')
            ->get();

        return view('penjual.dashboard', [
            'unconfirmedOrdersCount' => $unconfirmedOrdersCount,
            'confirmedOrdersCount' => $confirmedOrdersCount,
            'revenueData' => $revenueData,
        ]);
    }
}