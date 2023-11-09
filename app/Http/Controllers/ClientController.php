<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;
use PDF;
use Laravel\Scout\Searchable;


class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $results = Client::search($query)->get();

        return view('search.clients', compact('results'));
    }
    public function Create(){
        return view('ClientCreate');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'colony' => 'required|string|max:255',
            'address' => 'required|string',
            'cellphone' => 'required|string|max:15',
            'debt' => 'required|numeric',
            'debt_comment' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:1048',
        ]);

        $client = new Client();
        $client->name = $request->input('name');
        $client->lastname = $request->input('lastname');
        $client->colony = $request->input('colony');
        $client->address = $request->input('address');
        $client->cellphone = $request->input('cellphone');
        $client->debt = $request->input('debt');
        $client->comment = $request->input('debt_comment');

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $client->image = $imageName;
        }

        $client->save();
        
        return redirect('/Clients');
    }

    public function show(string $id)
    {
        $client = Client::find($id);

        if ($client) {
            return view('ClientShow', compact('client'));
        } else {
            return redirect()->route('clients.index')->with('error', 'Cliente no encontrado.');
        }
    }
    public function edit(string $id)
    {
        $client = Client::find($id);
        return view('ClientEdit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validación de datos
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'colony' => 'nullable',
            'address' => 'nullable',
            'cellphone' => 'nullable',
            'debt' => 'required',
            'debt_comment' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ejemplo de validación para la imagen
        ]);

        // Obtener el cliente a actualizar
        $client = Client::find($id);

        if (!$client) {
            // Manejar el caso en que el cliente no se encuentra
            return redirect()->route('clients.index')->with('error', 'Cliente no encontrado');
        }

        // Actualizar los datos del cliente
        $client->name = $request->input('name');
        $client->lastname = $request->input('lastname');
        $client->colony = $request->input('colony');
        $client->address = $request->input('address');
        $client->cellphone = $request->input('cellphone');
        $client->debt = $request->input('debt');
        $client->comment = $request->input('debt_comment');

        // Manejo de la imagen (si se proporciona)
        if ($request->hasFile('image')) {
            // Validar y guardar la imagen
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Eliminar la imagen anterior si existe
            if ($client->image) {
                $imagePath = public_path('images/') . $client->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $client->image = $imageName; // Guardar el nombre de la nueva imagen en el modelo
        }

        $client->save();

        return redirect()->route('clients.show', $client->id)->with('success', 'Cliente actualizado con éxito');
    }
    public function destroy(string $id)
    {
        $client = Client::find($id); // Obtén el cliente por su ID

        if ($client) {
            // Borra la imagen asociada al cliente si existe
            $imagePath = public_path('images/' . $client->image); // Ruta a la imagen en el sistema de archivos
            if (file_exists($imagePath)) {
                unlink($imagePath); // Elimina la imagen
            }

            // Elimina el cliente
            $client->delete();
            return redirect("/Clients");
        }
    }
    public function pdf(Request $request)
    {
        $query = $request->query('query', ''); // Obtenemos el valor de 'query' de la URL, o una cadena vacía si no está presente.
        
        $clients = Client::where(function ($queryBuilder) use ($query) {
            $lowerQuery = mb_strtolower($query, 'UTF-8');
            $queryBuilder->whereRaw("LOWER(name) LIKE ?", ["%$lowerQuery%"])
                        ->orWhereRaw("LOWER(lastname) LIKE ?", ["%$lowerQuery%"])
                        ->orWhereRaw("LOWER(colony) LIKE ?", ["%$lowerQuery%"])
                        ->orWhereRaw("LOWER(address) LIKE ?", ["%$lowerQuery%"])
                        ->orWhere('cellphone', 'like', '%' . $query . '%')
                        ->orWhere('debt', 'like', '%' . $query . '%')
                        ->orWhereRaw("LOWER(comment) LIKE ?", ["%$lowerQuery%"]);
        })->get();

        $pdf = PDF::loadView('pdf.clients', compact('clients', 'query'));
        return $pdf->download('Clients.pdf');
    }
}
