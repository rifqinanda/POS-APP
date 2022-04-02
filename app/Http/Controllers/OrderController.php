<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sales;

class OrderController extends Controller
{
    function getPDF($type){

        $pdf = app('dompdf.wrapper')->loadView('backend.invoice.invoice');

        if ($type == 'stream') {
            return $pdf->stream('invoice.pdf');
        }

        if ($type == 'download') {
            return $pdf->download('invoice.pdf');
        }
    }

    public function index()
    {
        $sales = Sales::with('products')->paginate(4);
        return view('backend.invoice.invoice', compact('sales'));
    }
}
