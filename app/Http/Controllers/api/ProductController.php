<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('status', 'supplier', 'creator')->get();
        return $products;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $userConnected = auth()->user();
        Log::info('user connected produit');
        Log::info(json_encode($userConnected));
        $newProduct = new Product();
        $newProduct->name = $request->name;
        $newProduct->quantity = $request->quantity;
        $newProduct->packaging = $request->packaging;
        $newProduct->price_ht = $request->price_ht;
        $newProduct->tva = $request->vat;
        $newProduct->margin_rate = $request->margin_rate;
        $newProduct->price_ttc = $request->price_ttc;
        $newProduct->supplier_id = $request->supplier;
        $newProduct->created_by = 1;
        $newProduct->status_id = 1;

        $newProduct->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
