@extends('layouts.app')
@section('title','Sale Product Create')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->
<form class="form-group" method="POST" action="/SaleProducts"> 
    @csrf 
    <div class="form-group">
    <label for="">Id de venta:</label>
            
        <select name="id_sale" class="form-control">
            @foreach($sales as $id)
                <option value="{{ $id }}">{{ $id }}</option>
            @endforeach
        </select>

        <br>
        <label for="id_product">Producto:</label>
        <select name="id_product" class="form-control">
            @foreach($products as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        <br>
        <label for="quantity">Cantidad:</label>
        <input type="number" name="quantity" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
