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
                    <table class="table text-center" style="max-height: 300px; overflow-y: auto;">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Acciones</th> <!-- Nueva columna para botones -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sale->saleProducts as $sale_product)
                                <tr>
                                    <td>{{ $sale_product->product->name }}</td>
                                    <td>${{ $sale_product->product->price }}</td>
                                    <td>{{ $sale_product->quantity }}</td>
                                    <td>${{ $sale_product->product->price * $sale_product->quantity }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('sale_products.destroy', ['saleId' => $sale->id, 'saleProductId' => $sale_product->id]) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar producto</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="total">
                        <h5>Total de la Venta: ${{ $sale->saleProducts->sum(function($sale_product) {
                            return $sale_product->product->price * $sale_product->quantity;
                        }) }}</h5>
                    </div>
                </li>
            </ul>
        </div>
        <div class="card-footer">
        <a href="{{ route('sales.edit', ['id' => $sale->id, 'productCount' => $sale->saleProducts->count()]) }}" class="btn btn-success">Editar</a>

                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar Venta</button>
            </form>
            <form method="POST" action="{{ route('sales.generatePdf', $sale->id) }}" style="display: inline;" target="_blank">
                @csrf
                <button type="submit" class="btn btn-secondary">Imprimir PDF</button>
            </form>
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <a href="{{ route('sales.index') }}" class="btn btn-primary">Volver a la lista de ventas</a>
</div>

<!-- Código de instalación Cliengo para la-vacota.com -->
<script type="text/javascript">
    (function () {
        var ldk = document.createElement('script');
        ldk.type = 'text/javascript';
        ldk.async = true;
        ldk.src = 'https://s.cliengo.com/weboptimizer/654262fa8de8db0032e440e7/65440aaabc71c70032c73683.js?platform=onboarding_modular';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ldk, s);
    })();
</script>
@endsection
