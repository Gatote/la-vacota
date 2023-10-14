<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('IndexProduct', compact('products'));
    }
    public function Create(){
        return view('ProductCreate');
    }
    public function store(Request $request)
    {
        $Product = new Product();
        $Product -> name = $request -> input('name');
        $Product -> description = $request -> input('description');
        $Product -> quantity = $request -> input('quantity');
        $Product -> price = $request -> input('price');
        $Product -> cost = $request -> input('cost');
        

        
        if ($request->hasFile('image')) {
            // Validar y guardar la imagen
            $request->validate([
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:1048',
            ]);

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $Product->image = $imageName; // Guardar el nombre de la imagen en el modelo
        }

        $Product -> save();
        return redirect('/Products');

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
