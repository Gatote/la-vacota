@extends('layouts.app')
@section('title', 'Sale Products')
@section('content')

<div class="container">
    <h2 class="text-center">Listado de ventas con sus productos</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Número de Venta</th>
                <th>Nombre del Producto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sale_products as $sale_product)
                <tr>
                    <td>{{$sale_product->id_sale}}</td>
                    <td>{{ $products[$sale_product->id_product] }}</td>
                    <td>
                        <a href="{{ route('sale_products.show', $sale_product->id) }}" class="btn btn-primary">Ver Detalles</a>
                        <!-- <a href="{{ route('sale_products.edit', $sale_product->id) }}" class="btn btn-success">Editar</a>
                        <form method="POST" action="{{ route('sale_products.destroy', $sale_product->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form> -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<a href="/SaleProduct/Create" class="btn btn-success btn-block">Crear Venta de Producto</a>
<!-- Código de instalación Cliengo para la-vacota.com --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/654262fa8de8db0032e440e7/65440aaabc71c70032c73683.js?platform=onboarding_modular'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>
@endsection
