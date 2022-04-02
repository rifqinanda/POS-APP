<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('categories')->orderBy('nama_produk','asc')->paginate(4);
        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('backend.products.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $products)
    {
        $request->validate([
            'nama_produk' => ['required', 'string', 'max:255', 'unique:products,nama_produk'],
            'id_kategori' => ['required'],
            'merk' => ['required'],
            'harga_beli' => ['required'],
            'harga_jual' => ['required'],
            'diskon' => ['required'],
            'stok' => ['required']
        ]);
        Product::create($request->all());
        

        return redirect('product')->with('status', 'Product Created');
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
        $products = Product::with('categories')->find($id);
        $categories = Category::all();
        return view('backend.products.edit', compact('products', 'categories'));
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
            'nama_produk' => ['required', 'string', 'max:255',Rule::unique('products', 'nama_produk')->ignore($id)],
            //'id_kategori' => ['required'],
            'merk' => ['required'],
            'harga_beli' => ['required'],
            'harga_jual' => ['required'],
            'diskon' => ['required'],
            'stok' => ['required']
        ]);

        $category = $request->category_old;

        if($request->id_kategori) {
            $category = $request->id_kategori;
        }

        Product::where('id', $id)
            ->update([
                'nama_produk' => $request->nama_produk,
                // 'branch_id' => $request->branch_id,
                'id_kategori' => $category,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'diskon' => $request->diskon,
                'stok' => $request->stok
            ]);

            return redirect('product')->with('status', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('product')->with('status', 'Studios deleted!');
    }
}
