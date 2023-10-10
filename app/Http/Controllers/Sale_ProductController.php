<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Sale_Product;

class Sale_ProductController extends Controller
{
    public function index()
    {
        $sale_products = Sale_Product::all();
        return view('IndexSaleProduct', compact('sale_products'));
    }
    public function Create(){
        return view('SaleProductCreate');
    }
    public function store(Request $request)
    {
        $SaleProduct = new Sale_Product();
        $SaleProduct -> id_sale = $request -> input('id_sale');
        $SaleProduct -> id_product = $request -> input('id_product');
        $SaleProduct -> quantity = $request -> input('quantity');
        $SaleProduct -> save();
        return view("Menu");
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
