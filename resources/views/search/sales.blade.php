@extends('layouts.app')
@section('title', 'Ventas')
@section('content')
@php
use App\Models\Client;
use App\Models\Product;
use App\Models\Sale_Product;
@endphp

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <div class="card-header d-flex justify-content-between align-items-center">

                <form action="{{ route('sales.index') }}" method="GET">
                        <label for="search">Buscar por cliente:</label>
                        <input type="text" class="form-control" id="search" name="query" placeholder="Nombre del cliente">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
                
                <h2 class="card-title">Listado de Ventas</h2>

                <div class="text-center mt-4">
                    <a href="/Sale/Create" class="btn btn-success btn-lg">Crear Venta</a>
                    <a href="{{ route('Sales.pdf') }}" class="btn btn-primary btn-lg">Descargar PDF de Ventas</a>
                </div>
            </div>


            
            <div class="row">
                @if($sales->count() > 0)
                    @foreach ($sales as $sale)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h4 class="card-title">Número de Venta: {{ $sale->id }}</h4>
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
                        </div>
                    @endforeach
                @else
                    <p>No se encontraron resultados para la consulta: <strong>{{ request('query') }}</strong></p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/654262fa8de8db0032e440e7/65440aaabc71c70032c73683.js?platform=onboarding_modular'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>