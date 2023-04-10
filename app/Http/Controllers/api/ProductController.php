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
    public function index(Request $request)
    {
        $products = Product::withTrashed()->with('status', 'supplier', 'creator');

        if ($request->filled('search')) {
            $products = $products->where('name', 'like', '%' . $request->search . '%');
        }

        $itemsPerPage = $request->get('itemsPerPage', -1);
        if ($itemsPerPage === -1 || $itemsPerPage === '-1') {
            $itemsPerPage = $products->count();
        }

        $products = $products->paginate($itemsPerPage);

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
        $newProduct = new Product();
        $newProduct->name = $request->name;
        $newProduct->quantity = $request->quantity;
        $newProduct->packaging = $request->packaging;
        $newProduct->price_ht = $request->price_ht;
        $newProduct->tva = $request->vat;
        $newProduct->margin_rate = $request->margin_rate;
        $newProduct->price_ttc = $request->price_ttc;
        $newProduct->supplier_id = $request->supplier;
        $newProduct->created_by = $userConnected->id;
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
        $product = $product->delete();
        return $product;
    }
    
    public function restore(Product $product)
    {
        $product = $product->restore();
        return $product;
    }

    public function permanentDelete($id)
    {
        $product = Product::withTrashed()
                        ->where('id', $id)
                        ->first();

        $product->forceDelete();
    }
}
