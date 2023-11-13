<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Sale_Product;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

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
        
        // Asegúrate de ajustar el nombre de la variable aquí
        $quantity_of_products = 0;

        return view('SaleProductCreate', compact('sales', 'products', 'quantity_of_products'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_sale' => 'required|integer|min:1',
                'products' => 'required|array',
                'quantity_sold' => 'required|array'
            ]);
            
            $id_sale = $request->input('id_sale');
            $products = $request->input('products');
            $quantity_sold = $request->input('quantity_sold');
            $quantityOfProducts = $request->input('quantity_sold');

            // Guardar cada producto vendido en la venta
            for ($i = 0; $i < count($products); $i++) {
                $saleProduct = new Sale_Product();
                $saleProduct->id_sale = $id_sale;
                $saleProduct->id_product = $products[$i];
                $saleProduct->quantity = $quantity_sold[$i];
                $saleProduct->save();
            }

            return redirect("/Sale/Show/{$id_sale}")->with('success', 'Venta creada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

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

    public function destroy($saleId, $saleProductId)
    {
        try {
            // Obtén la relación específica
            $saleProduct = Sale_Product::find($saleProductId);
    
            if ($saleProduct) {
                // Crea una transacción para asegurar la integridad de los datos
                DB::beginTransaction();
    
                try {
                    // Crea una copia del producto asociado a la relación
                    $copiedProduct = $saleProduct->product->replicate();
                    $copiedProduct->save();
    
                    // Elimina la relación producto-venta
                    $saleProduct->delete();
    
                    // Confirma la transacción
                    DB::commit();
    
                    return redirect()->back()->with('success', 'Relación producto-venta eliminada exitosamente.');
                } catch (\Exception $e) {
                    // Revierte la transacción en caso de error
                    DB::rollBack();
                    throw $e;
                }
            } else {
                return redirect()->back()->with('error', 'Relación producto-venta no encontrada.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }    
}
