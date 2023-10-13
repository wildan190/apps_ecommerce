<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use PDF;


class SalesReportController extends Controller
{
    public function showSalesReport()
    {
        // Retrieve data for the sales report (e.g., using Eloquent)
        $salesData = OrderItem::all(); // Gantilah ini dengan logika yang sesuai

        return view('penjual.sales-report', compact('salesData'));
    }

    public function generateSalesReportPDF()
    {
        $salesData = OrderItem::all(); // Gantilah ini dengan logika yang sesuai

        $pdf = PDF::loadView('sales-report-pdf', compact('salesData'));

        return $pdf->download('sales-report.pdf');
    }
}
