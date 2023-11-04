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
<!-- Código de instalación Cliengo para la-vacota.com --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/654262fa8de8db0032e440e7/65440aaabc71c70032c73683.js?platform=onboarding_modular'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>
@endsection
