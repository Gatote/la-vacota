<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Sale_Product;
use App\Models\Sale;
use App\Models\Product;

class Sale_ProductController extends Controller
{
    public function index()
    {
        $sale_products = Sale_Product::all();
        $products = Product::all()->pluck('name', 'id');

        return view('IndexSaleProduct', compact('sale_products', 'products'));
    }

    public function create()
    {
        $sales = Sale::all()->pluck('id');
        $products = Product::all()->pluck('name', 'id', 'image');
        
        return view('SaleProductCreate', compact('sales', 'products'));
    }

    public function store(Request $request)
    {
        $SaleProduct = new Sale_Product();
        $SaleProduct -> id_sale = $request -> input('id_sale');
        $SaleProduct -> id_product = $request -> input('id_product');
        $SaleProduct -> quantity = $request -> input('quantity');
        $SaleProduct -> save();
        return redirect("/SaleProducts");
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sale_product = Sale_Product::find($id);
        if ($sale_product) {
            $product = Product::find($sale_product->id_product); // Obtener el producto asociado a la venta
            return view('SaleProductShow', compact('sale_product', 'product'));
        } else {
            return redirect()->route('sale_products.index')->with('error', 'Venta de producto no encontrada.');
        }
    }

    
    public function edit(string $id)
    {
        $sale_product = Sale_Product::find($id);
        $sales = Sale::all()->pluck('id');
        $products = Product::all()->pluck('name', 'id', 'image');
        
        return view('SaleProductEdit', compact('sales', 'products', 'sale_product'));
    }

    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'id_sale' => 'required|exists:sales,id',
            'id_product' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Encontrar el registro de SaleProduct que se va a actualizar
        $saleProduct = Sale_Product::findOrFail($id);

        // Actualizar los campos con los datos validados
        $saleProduct->id_sale = $validatedData['id_sale'];
        $saleProduct->id_product = $validatedData['id_product'];
        $saleProduct->quantity = $validatedData['quantity'];

        // Guardar los cambios en la base de datos
        $saleProduct->save();

        // Redireccionar a la vista de detalles o a donde desees
        return redirect()->route('sale_products.show', $saleProduct->id)->with('success', 'Venta actualizada con éxito');
    }

    public function destroy(string $id)
    {
        $sale_product = Sale_Product::find($id);

        if ($sale_product) {
            $sale_product->delete();
            return redirect("/SaleProducts");
        }
    }
}
