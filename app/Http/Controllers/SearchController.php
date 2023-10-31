<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client; // Importa el modelo que deseas buscar

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $results = Client::search($query)->get();

        return view('search.results', compact('results'));
    }

}
