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
        $client -> name = $request -> input('name');
        $client -> lastname = $request -> input('lastname');
        $client -> colony = $request -> input('colony');
        $client -> address = $request -> input('address');
        $client -> cellphone = $request -> input('cellphone');
        $client -> debt = $request -> input('debt');
        $client -> comment = $request -> input('comment');
        $client -> save();
        $clients = Client::all();
        return view("Menu");
        //laravel redirect
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
