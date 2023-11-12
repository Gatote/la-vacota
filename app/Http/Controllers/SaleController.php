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
            $query->where('name', 'like', '%' . $searchQuery . '%');
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
        ]);

        $sale = new Sale();
        $sale->date = $request->input('date');
        $sale->id_client = $request->input('id_client');
        $sale->save();

        return redirect("/Sales");
    }
    public function show(string $id)
    {
        $sale = Sale::find($id);

        if ($sale) {
            // Obtén el cliente relacionado con esta venta
            $client = Client::find($sale->id_client);

            if ($client) {
                return view('SaleShow', compact('sale', 'client'));
            } else {
                return redirect()->route('sales.index')->with('error', 'Cliente no encontrado.');
            }
        } else {
            return redirect()->route('sales.index')->with('error', 'Venta no encontrada.');
        }
    }
    public function edit(string $id)
    {
        $sale = Sale::find($id);
        $clients = Client::select('id', 'name', 'lastname')->get();
        return view('SaleEdit', compact('sale', 'clients'));
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
    public function deleteProduct($saleId, $productId)
    {
        try {
            $saleProduct = Sale_Product::where('id_sale', $saleId)
                ->where('id_product', $productId)
                ->first();

            if ($saleProduct) {
                $saleProduct->delete();
                return redirect()->back()->with('success', 'Producto eliminado exitosamente.');
            } else {
                return redirect()->back()->with('error', 'Producto no encontrado en la venta.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
