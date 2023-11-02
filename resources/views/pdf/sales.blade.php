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


<div class="row">
    @if($saless->count() > 0)
        @foreach ($saless as $sale)
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
                </div>
            </div>
        @endforeach
    @else
        <p>No se encontraron resultados para la consulta: <strong>{{ request('query') }}</strong></p>
    @endif
</div>
</div>
