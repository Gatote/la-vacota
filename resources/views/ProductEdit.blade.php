@extends('layouts.app')
@section('title', 'Editar Producto')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->
<form class="form-group" method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        <br>
        <label for="description">Descripción:</label>
        <input type="text" name="description" class="form-control" value="{{ $product->description }}">
        <br>
        <label for="quantity">Cantidad:</label>
        <input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
        <br>
        <label for="price">Precio:</label>
        <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
        <br>
        <label for="cost">Costo:</label>
        <input type="number" name="cost" class="form-control" value="{{ $product->cost }}" required>
        <br>
        <label for="image">Seleccionar una foto nueva (opcional):</label>
        <input type="file" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
</form>
@endsection
