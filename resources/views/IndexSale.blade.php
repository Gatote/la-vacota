@extends('layouts.app')
@section('title', 'Ventas')
@section('content')
@php
use App\Models\Client; // Importa el modelo Client
use App\Models\Product;
use App\Models\Sale_Product;
@endphp

<style>
    /* Agrega el estilo CSS para limitar el ancho de la tabla */
    .table-limit-width {
        max-width: 100%;
    }

    /* Estilo para las tarjetas de ventas */
    .sale-card {
        border: 1px solid #e2e2e2;
        border-radius: 5px;
        margin: 10px;
        padding: 10px;
    }
</style>

<h2>Listado de Ventas</h2>

<div class="row">
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
</div>
<a href="/Sale/Create" class="btn btn-success btn-block">Crear Venta</a>
@endsection
