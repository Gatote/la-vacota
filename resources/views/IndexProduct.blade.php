@extends('layouts.app')
@section('title', 'Productos')
@section('content')

<h2>Listado de productos</h2>

<form action="{{ route('search/products') }}" method="GET">
    <input type="text" name="query" placeholder="Buscar...">
    <button type="submit">Buscar</button>
</form>

<table class="table">
    <thead>
        <tr>
            <!-- <th>ID</th> -->
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cantidad disponible</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <!-- <td>{{ $product->id }}</td> -->
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Ver Detalles</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="/Product/Create" class="btn btn-success btn-block">Crear Producto</a>
<a href="{{ route('Products.pdf') }}" class="btn btn-primary">Descargar PDF de Productos</a>
<!-- Código de instalación Cliengo para la-vacota.com --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/654262fa8de8db0032e440e7/65440aaabc71c70032c73683.js?platform=onboarding_modular'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>
@endsection
