@extends('layouts.app')
@section('title', 'Editar Venta de Producto')
@section('content')

<div class="container text-center">
    <h2>Editar Venta de Producto</h2>
</div>

<div class "container mt-4">
    <div class="card" style="max-width: 400px; margin: 0 auto;">
        <div class="card-body">
            <form class="form-group" method="POST" action="{{ route('sale_products.update', $sale_product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('FormSaleProduct')
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <a href="{{ route('sale_products.show', $sale_product->id) }}" class="btn btn-primary">Volver a la lista de ventas de productos</a>
</div>
@endsection
