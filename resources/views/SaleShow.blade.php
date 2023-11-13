@extends('layouts.app')
@section('title', 'Detalles de Venta')
@section('content')

<div class="container text-center">
    <h2>Detalles de Venta</h2>
</div>

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Número de Venta: {{ $sale->id }}</h5>
            <ul class="list-group">
                <li class="list-group-item">Cliente: {{ $client->name }} {{ $client->lastname }}</li>
                <li class="list-group-item">Fecha: {{ $sale->date }}</li>
                <li class="list-group-item">Productos Vendidos:
                    <ul>
                    @foreach ($sale->saleProducts as $sale_product)
                        <li>
                            {{$sale_product}}
                            <br>
                            {{ $sale_product->product->name }}
                            <form method="POST" action="{{ route('sale_products.destroy', ['saleId' => $sale->id, 'saleProductId' => $sale_product->id]) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                            <a href="{{ route('sale_products.show', $sale_product->id) }}" class="btn btn-primary">Mostrar</a>
                        </li>
                    @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-success">Editar</a>
            <form method="POST" action="{{ route('sales.destroy', $sale->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
                
            </form>
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <a href="{{ route('sales.index') }}" class="btn btn-primary">Volver a la lista de ventas</a>
</div>
<!-- Código de instalación Cliengo para la-vacota.com --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/654262fa8de8db0032e440e7/65440aaabc71c70032c73683.js?platform=onboarding_modular'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>
@endsection
