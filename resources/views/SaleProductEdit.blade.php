@extends('layouts.app')
@section('title', 'Editar Venta de Producto')
@section('content')

<div class="container text-center">
    <h2>Editar Venta de Producto</h2>
</div>

<div class="container mt-4">
    <div class="card" style="max-width: 400px; margin: 0 auto;">
        <div class="card-body">
            <form class="form-group" method="POST" action="{{ route('sale_products.update', $sale_product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id_sale">ID de Venta:</label>
                    <select name="id_sale" class="form-control">
                        @foreach($sales as $id)
                            <option value="{{ $id }}" {{ $id == $sale_product->sale_id ? 'selected' : '' }}>{{ $id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_product">Producto:</label>
                    <select name="id_product" class="form-control">
                        @foreach($products as $id => $name)
                            <option value="{{ $id }}" {{ $id == $sale_product->product_id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Cantidad:</label>
                    <input type="number" name="quantity" class="form-control" value="{{ $sale_product->quantity }}">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <a href="{{ route('sale_products.show', $sale_product->id) }}" class="btn btn-primary">Volver a la lista de ventas de productos</a>
</div>
@endsection
