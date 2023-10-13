<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('IndexClient', compact('clients'));
    }
    public function Create(){
        return view('ClientCreate');
    }
    public function store(Request $request)
    {
        $client = new Client();
        $client->name = $request->input('name');
        $client->lastname = $request->input('lastname');
        $client->colony = $request->input('colony');
        $client->address = $request->input('address');
        $client->cellphone = $request->input('cellphone');
        $client->debt = $request->input('debt');
        $client->comment = $request->input('debt_comment'); // Corregí el nombre del campo

        if ($request->hasFile('image')) {
            // Validar y guardar la imagen
            $request->validate([
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:1048',
            ]);

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $client->image = $imageName; // Guardar el nombre de la imagen en el modelo
        }

        $client->save();
        
        return redirect('/Clients');
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
    public function imageUpload(Request $request): RedirectResponse
    {
        // dd(($request->all()));
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:1048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'),$imageName);

        return view("Menu");
    }
}
