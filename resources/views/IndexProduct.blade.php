@extends('layouts.app')
@section('title', 'Productos')
@section('content')
<h2>Listado de productos</h2>

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
                    <!-- <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success">Editar</a> -->
                    <!-- <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form> -->
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="/Product/Create" class="btn btn-success btn-block">Crear Producto</a>
<a href="{{ route('Products.pdf') }}" class="btn btn-primary">Descargar PDF de Productos</a>
@endsection
