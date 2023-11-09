<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use PDF;
use Laravel\Scout\Searchable;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $results = Product::search($query)->get();

        return view('search.products', compact('results'));
    }
    public function Create(){
        return view('ProductCreate');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'cost' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:1048',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->quantity = $request->input('quantity');
        $product->price = $request->input('price');
        $product->cost = $request->input('cost');

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();
        
        return redirect('/Products');
    }
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
    public function pdf(Request $request)
    {
        $query = $request->query('query', ''); // Obtenemos el valor de 'query' de la URL, o una cadena vacía si no está presente.
        
        $products = Product::where(function ($queryBuilder) use ($query) {
            $lowerQuery = mb_strtolower($query, 'UTF-8');
            $queryBuilder->whereRaw("LOWER(name) LIKE ?", ["%$lowerQuery%"])
                        ->orWhereRaw("LOWER(description) LIKE ?", ["%$lowerQuery%"])
                        ->orWhere('price', 'like', '%' . $query . '%')
                        ->orWhere('cost', 'like', '%' . $query . '%')
                        ->orWhere('profit', 'like', '%' . $query . '%');
        })->get();
    
        $pdf = PDF::loadView('pdf.products', compact('products', 'query'));
        return $pdf->download('Products.pdf');
    }    
}
