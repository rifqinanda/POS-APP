<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Product;
use App\Models\User;
use Illuminate\Validation\Rule;
use PDF;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sales::with('products')->get();
        return view('backend.transaction.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $users = User::all();
        return view('backend.transaction.sales.create', compact('products', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => ['required'],
            'total_item' => ['required'],
            'diskon' => ['required'],
        ]);

            // $harga = $sales->total_item * $products->harga_jual;
            // $bayar = $harga * $sales->diskon / 100;
        
                        
        $sales = Sales::create([
            'id_produk' => $request->id_produk,
            'total_item' => $request->total_item,
            'diskon' => $request->diskon,
        ]);
        

        return redirect('sales')->with('status', 'Sales Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sales = Sales::with('products')->find($id);
        $products = Product::all();
        return view('backend.transaction.sales.edit', compact('sales','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'nama_produk' => ['required', 'string', 'max:255', 'unique:products,nama_produk'],
            // 'id_produk' => ['required'],
            'total_item' => ['required'],
            // 'total_harga' => ['required'],
            'diskon' => ['required'],
            // 'total_bayar' => ['required'],
        ]);

        $produk = $request->produk_old;

        if($request->id_produk) {
            $produk = $request->id_produk;
        }

        Sales::where('id', $id)
            ->update([
                'id_produk' => $produk,
                'total_item' => $request->total_item,
                // 'total_harga' => $request->total_harga,
                'diskon' => $request->diskon,
            ]);

            return redirect('sales')->with('status', 'Sales transaction updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sales::destroy($id);
        return redirect('sales')->with('status', 'Sales deleted!');
    }


    function getPDF($id){

        $sales = Sales::with('products')->find($id);
        $products = Product::all();
        //return view('backend.invoice.invoice', compact('sales','products'));

        $pdf = app('dompdf.wrapper')->loadView('backend.invoice.invoice', compact('sales','products'));
        // $pdf = PDF::loadview('backend.invoice.invoice', ['pdf' => 'ini adalah contoh laporan PDF'], compact('sales','products'));
        // if ($type == 'stream') {
            // return $pdf->stream('invoice.pdf');
        // }

        // if ($type == 'download') {
            return $pdf->download('invoice.pdf');
        // }
    }

}
