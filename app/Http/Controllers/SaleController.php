<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Sale;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('IndexSale', compact('sales'));
    }
    public function Create(){
        return view('SaleCreate');
    }
    public function store(Request $request)
    {
        $Sale = new Sale();
        $Sale -> date = $request -> input('date');
        $Sale -> id_client = $request -> input('id_client');
        $Sale -> save();
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
