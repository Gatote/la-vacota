<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use PDF;

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
        $product = Product::find($id);

        if ($product) {
            return view('ProductShow', compact('product'));
        } else {
            return redirect()->route('products.index')->with('error', 'Cliente no encontrado.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Aquí debes buscar el cliente por su ID, suponiendo que tienes un modelo llamado "Client"
        $product = Product::find($id);
    
        // Luego, puedes retornar la vista de edición junto con el cliente encontrado
        return view('ProductEdit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validación de datos
    $this->validate($request, [
        'name' => 'required',
        'description' => 'nullable',
        'price' => 'required',
        'cost' => 'required',
        'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:1048',
    ]);

    // Obtener el producto a actualizar
    $product = Product::find($id);

    if (!$product) {
        // Manejar el caso en que el producto no se encuentra
        return redirect()->route('products.index')->with('error', 'Producto no encontrado');
    }

    // Actualizar los datos del producto
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->cost = $request->input('cost');

    // Manejo de la imagen (si se proporciona)
    if ($request->hasFile('image')) {
        // Validar y guardar la imagen
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:1048',
        ]);

        // Eliminar la imagen anterior si existe
        if ($product->image) {
            $imagePath = public_path('images/') . $product->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $product->image = $imageName; // Guardar el nombre de la nueva imagen en el modelo
    }

    $product->save();

    return redirect()->route('products.show', $product->id)->with('success', 'Producto actualizado con éxito');
}


    public function destroy(string $id)
    {
        $product = Product::find($id);

        if ($product) {
            $imagePath = public_path('images/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $product->delete();
            return redirect("/Products");
        }
    }

    public function pdf()
    {
        $products = Product::all();
        $pdf = PDF::loadView('pdf.products', compact('products'));
        return $pdf->download('Products.pdf');
    }
}
