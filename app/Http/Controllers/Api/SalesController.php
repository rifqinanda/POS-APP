<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SalesResource;
use App\Models\Sales;

class SalesController extends Controller
{
    public function index()
    {
        $data = Sales::latest()->get();
        return response()->json([SalesResource::collection($data), 'Sales fetched.']);
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
            'id_produk' => ['required'],
            'total_item' => ['required'],
            'diskon' => ['required'],
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $sales = Sales::create($request->all());
        
        return response()->json(['Sales created successfully.', new SalesResource($sales)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales = Sales::find($id);
        if (is_null($sales)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new SalesResource($sales)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        $validator = Validator::make($request->all(),[
            'id_produk' => ['required'],
            'total_item' => ['required'],
            'diskon' => ['required'],
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $sales->id_produk = $request->id_produk;
        $sales->total_item = $request->total_item;
        $sales->total_harga = $request->total_harga;
        $sales->diskon = $request->diskon;
        $sales->total_bayar = $request->total_bayar;
        $sales->save();
        
        return response()->json(['Sales updated successfully.', new SalesResource($sales)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        $sales->delete();

        return response()->json('Sales deleted successfully');
    }

}
