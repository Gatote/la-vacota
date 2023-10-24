@extends('layouts.app')
@section('title', 'Crear Venta de Producto')
@section('content')

<div class="container text-center">
    <h2>Crear Venta de Producto</h2>
</div>

<div class="container mt-4">
    <div class="card" style="max-width: 400px; margin: 0 auto;">
        <div class="card-body">
            <form class="form-group" method="POST" action="/SaleProducts">
                @csrf
                <div class="form-group">
                    <label for="id_sale">ID de Venta:</label>
                    <select name="id_sale" class="form-control">
                        @foreach($sales as $id)
                            <option value="{{ $id }}">{{ $id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_product">Producto:</label>
                    <select name="id_product" class="form-control">
                        @foreach($products as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Cantidad:</label>
                    <input type="number" name="quantity" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <a href="/SaleProducts" class="btn btn-primary">Volver a la lista de ventas de productos</a>
</div>
@endsection
