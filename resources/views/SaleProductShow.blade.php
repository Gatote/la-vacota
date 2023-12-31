@extends('layouts.app')
@section('title', 'Sale Products')
@section('content')

<div class="container text-center">
    <h2>Detalles de Venta con Producto</h2>
</div>

<div class="container mt-4">
    <div class="card" style="max-width: 400px; margin: 0 auto;">
        <div class="card-body">
            <h5 class="card-title">Número de Venta: {{$sale_product->id_sale}}</h5>
            <ul class="list-group">
                <li class="list-group-item">Producto: {{ $product->name }}</li>
                <li class="list-group-item">Cantidad: {{$sale_product->quantity}}</li>
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('sale_products.edit', $sale_product->id) }}" class="btn btn-success">Editar</a>
            <form method="POST" action="{{ route('sale_products.destroy', $sale_product->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <a href="/SaleProducts" class="btn btn-primary">Volver a la lista de ventas de productos</a>
</div>
<!-- Código de instalación Cliengo para la-vacota.com --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/654262fa8de8db0032e440e7/65440aaabc71c70032c73683.js?platform=onboarding_modular'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>
@endsection
