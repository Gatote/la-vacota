<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Sale_Product;
use App\Models\Client;
use PDF;


class SaleController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->input('query');

        $sales = Sale::whereHas('client', function($query) use ($searchQuery) {
            $query->where(function($subquery) use ($searchQuery) {
                $subquery->where('name', 'ilike', '%' . $searchQuery . '%')
                         ->orWhere('lastname', 'ilike', '%' . $searchQuery . '%');
            });
        })->get();
        
        

        return view('search.sales', compact('sales'));
    }

    public function create()
    {
        $clients = Client::select('id', 'name', 'lastname')->get();
        return view('SaleCreate', compact('clients'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'id_client' => 'required|integer|min:1',
            'quantity_of_products' => 'required|integer|min:1',
        ]);

        $sale = new Sale();
        $sale->date = $request->input('date');
        $sale->id_client = $request->input('id_client');
        $sale->save();

        // Obtén el ID de la venta recién creada
        $saleId = $sale->id;
        // Obtén la cantidad de productos del formulario
        $quantityOfProducts = $request->input('quantity_of_products');

        $sales = Sale::all()->pluck('id');
        $products = Product::all()->pluck('name', 'id', 'image');
    
        // Pasa $saleId y $quantityOfProducts a la vista SaleProductCreate usando compact
        return view('SaleProductCreate', compact('sales', 'products', 'saleId', 'quantityOfProducts'));
    }
    public function show(string $id)
    {
        $sale = Sale::with('saleProducts')->find($id);
        if ($sale) {
            // Obtén el cliente relacionado con esta venta
            $client = Client::find($sale->id_client);
            // Obtén el cliente relacionado con esta venta
            $saleproduct = Sale_Product::find($sale->id_sale_product);

            if ($client) {
                return view('SaleShow', compact('sale', 'client', 'saleproduct'));
            } else {
                return redirect()->route('sales.index')->with('error', 'Cliente no encontrado.');
            }
        } else {
            return redirect()->route('sales.index')->with('error', 'Venta no encontrada.');
        }
    }
    public function edit($id, $productCount)
    {
        $sale = Sale::find($id);
        $clients = Client::select('id', 'name', 'lastname')->get();
        return view('SaleEdit', compact('sale', 'clients', 'productCount'));
    }
    public function update(Request $request, $id)
    {
        // Validación de datos
        $this->validate($request, [
            'date' => 'required',
            'id_client' => 'required',
        ]);

        // Obtener la venta a actualizar
        $sale = Sale::find($id);

        if (!$sale) {
            // Manejar el caso en que la venta no se encuentra
            return redirect()->route('sales.index')->with('error', 'Venta no encontrada');
        }

        // Actualizar los datos de la venta
        $sale->date = $request->input('date');
        $sale->id_client = $request->input('id_client');

        $sale->save();

        return redirect()->route('sales.show', $sale->id)->with('success', 'Venta actualizada con éxito');
    }
    public function destroy(string $id)
    {
        $sale = Sale::find($id);

        if ($sale) {
            $sale->delete();
            return redirect("/Sales");
        }
    }
    public function pdf()
    {
        $saless = Sale::all();
        $pdf = PDF::loadView('pdf.sales', compact('saless'));
        return $pdf->download('Sales.pdf');
    }
    public function deleteProduct($saleProductId)
    {
        dd($saleProductId);
        try {
            $saleProduct = Sale_Product::find($saleProductId);

            if ($saleProduct) {
                $saleProduct->delete(); // Eliminar el registro de Sale_Product
                return redirect()->back()->with('success', 'Producto eliminado exitosamente.');
            } else {
                return redirect()->back()->with('error', 'Producto no encontrado en la venta.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function generatePdf(string $id)
    {
        $sale = Sale::with('client', 'saleProducts')->find($id);
        // Obtén el cliente relacionado con esta venta
        $client = Client::find($sale->id_client);

        if ($sale) {
            // Cargar la vista PDF
            $pdf = PDF::loadView('pdf.saleticket', compact('sale', 'client'));

            // Descargar el PDF
            return $pdf->download('saleticket.pdf');
        } else {
            return redirect()->route('sales.index')->with('error', 'Venta no encontrada.');
        }
    }
}
