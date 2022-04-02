<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::latest()->get();
        return response()->json([ProductResource::collection($data), 'Products fetched.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_produk' => ['required', 'string', 'max:255', 'unique:products,nama_produk'],
            'id_kategori' => ['required'],
            'merk' => ['required'],
            'harga_beli' => ['required'],
            'harga_jual' => ['required'],
            'diskon' => ['required'],
            'stok' => ['required'],
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $product = Product::create($request->all());
        
        return response()->json(['Product created successfully.', new ProductResource($product)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (is_null($product)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new ProductResource($product)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(),[
            'nama_produk' => ['required', 'string', 'max:255', 'unique:products,nama_produk'],
            'id_kategori' => ['required'],
            'merk' => ['required'],
            'harga_beli' => ['required'],
            'harga_jual' => ['required'],
            'diskon' => ['required'],
            'stok' => ['required']
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $product->nama_produk = $request->nama_produk;
        $product->id_kategori = $request->id_kategori;
        $product->merk = $request->merk;
        $product->harga_beli = $request->harga_beli;
        $product->harga_jual = $request->harga_jual;
        $product->diskon = $request->diskon;
        $product->stok = $request->stok;
        $product->save();
        
        return response()->json(['Product updated successfully.', new ProductResource($product)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $Product)
    {
        $product->delete();

        return response()->json('Product deleted successfully');
    }
}
