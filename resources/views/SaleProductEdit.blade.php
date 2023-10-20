@extends('layouts.app')
@section('title','Sale Product Create')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->
<form class="form-group" method="POST" action="{{ route('sale_products.update', $sale_product->id) }}" enctype="multipart/form-data">
    @csrf 
    @method('PUT') <!-- Agrega esta línea -->
    <div class="form-group">
    <label for="">Id de venta:</label>
            
        <select name="id_sale" class="form-control">
            @foreach($sales as $id)
                <option value="{{ $id }}" value="{{ $sale_product->sale_id }}">{{ $id }}</option>
            @endforeach
        </select>

        <br>
        <label for="id_product">Producto:</label>
        <select name="id_product" class="form-control" value="{{ $sale_product->product_id }}">
            @foreach($products as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        <br>
        <label for="quantity">Cantidad:</label>
        <input type="number" name="quantity" class="form-control" value="{{ $sale_product->quantity }}">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
