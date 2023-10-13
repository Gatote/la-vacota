@extends('layouts.app')
@section('title','Product Create')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->
<form class="form-group" method="POST" action="/Products" enctype="multipart/form-data">
    @csrf 
    <div clas="form-group">
        <label for="">Nombre:</label>
        <input type="text" name="name" class="form-control" required>
        <br>
        <label for="">Descripcion:</label>
        <input type="text" name="description" class="form-control">
        <br>
        <label for="">Cantidad:</label>
        <input type="text" name="quantity" class="form-control">
        <br>
        <label for="">Precio:</label>
        <input type="number" name="price" class="form-control">
        <br>
        <label for="">Costo:</label>
        <input type="number" name="cost" class="form-control">
        <br>
        <label for="">Ganancia:</label>
        <input type="number" name="profit" class="form-control">
        <br>
        <label for="imagen">Seleccionar una foto:</label>
        <input type="file" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection