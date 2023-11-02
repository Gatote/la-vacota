@extends('layouts.app')
@section('title', 'Ventas')
@section('content')
@php
use App\Models\Client;
use App\Models\Product;
use App\Models\Sale_Product;
@endphp

<style>
    /* Estilos CSS */
</style>

<h2>Listado de Ventas</h2>

<form action="{{ route('sales.index') }}" method="GET" class="form-inline">
    <div class="form-group mx-sm-3">
        <label for="search">Buscar por cliente:</label>
        <input type="text" class="form-control" id="search" name="query" placeholder="Nombre del cliente">
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>

<div class="row">
    @if($sales->count() > 0)
        @foreach ($sales as $sale)
            <div class="col-md-4">
                <div class="sale-card">
                    <h4>Número de Venta: {{ $sale->id }}</h4>
                    <p>Fecha: {{ $sale->date }}</p>
                    <p>Cliente: {{ $client = Client::find($sale->id_client)->name }} {{ $client = Client::find($sale->id_client)->lastname }}</p>
                    <p>Productos Vendidos:</p>
                    <ul>
                        @foreach($sale->products as $product)
                            <li>{{ $product->name }}</li>
                        @endforeach
                    </ul>
                    <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-primary">Ver Detalles</a>
                </div>
            </div>
        @endforeach
    @else
        <p>No se encontraron resultados para la consulta: <strong>{{ request('query') }}</strong></p>
    @endif
</div>
<a href="/Sale/Create" class="btn btn-success btn-block">Crear Venta</a>
<a href="{{ route('Sales.pdf') }}" class="btn btn-primary">Descargar PDF de Ventas</a>
@endsection
