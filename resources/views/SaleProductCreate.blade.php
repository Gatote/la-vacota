@extends('layouts.app')
@section('title', 'Crear Venta de Producto')
@section('content')

<div class="container text-center">
    <h2>Crear Venta de Producto</h2>
</div>

<div class="container mt-4">
    <div class="card" style="max-width: 400px; margin: 0 auto;">
        <div class="card-body">
            <form class="form-group" method="POST" action="{{ route('sale_products.store') }}" enctype="multipart/form-data">
                @csrf
                @include('FormSaleProduct')
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <a href="{{ route('sale_products.index') }}" class="btn btn-primary">Volver a la lista de ventas de productos</a>
</div>
@endsection
