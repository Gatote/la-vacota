@extends('layouts.app')
@section('title', 'Sale Products')
@section('content')
@include('header')

<div class="container">
    <h2 class="text-center">Listado de ventas con sus productos</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Número de Venta</th>
                <th>Número de Producto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sale_products as $sale_product)
                <tr>
                    <td>{{$sale_product->id_sale}}</td>
                    <td>{{ $sale_product->id_product }}</td>
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
@endsection
