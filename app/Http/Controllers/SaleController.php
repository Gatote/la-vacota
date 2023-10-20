<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Client;


class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('IndexSale', compact('sales'));
    }
    public function Create(){
        $clientIds = Client::pluck('id');
        return view('SaleCreate', compact('clientIds'));
    }
    public function store(Request $request)
    {
        $Sale = new Sale();
        $Sale -> date = $request -> input('date');
        $Sale -> id_client = $request -> input('id_client');
        $Sale -> save();
        return view("Menu");
    }
    public function show(string $id)
    {
        $sale = Sale::find($id);

        if ($sale) {
            return view('SaleShow', compact('sale'));
        } else {
            return redirect()->route('sales.index')->with('error', 'Cliente no encontrado.');
        }
    }
    public function edit(string $id)
    {
        $sale = Sale::find($id);
        $clientIds = Client::pluck('id');
        
        return view('SaleEdit', compact('sale', 'clientIds'));
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
}
