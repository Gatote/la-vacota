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
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Ver Detalles</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="/Product/Create" class="btn btn-success btn-block">Crear Producto</a>
<a href="{{ route('Products.pdf') }}" class="btn btn-primary">Descargar PDF de Productos</a>
@endsection
