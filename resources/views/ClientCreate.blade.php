@extends('layouts.app')
@section('title','Client Create')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->
<form class="form-group" method="POST" action="/Clients"> 
    @csrf 
    <div clas="form-group">
        <label for="">Nombre:</label>
        <input type="text" name="name" class="form-control" required>
        <br>
        <label for="">Apellido:</label>
        <input type="text" name="lastname" class="form-control" required >
        <br>
        <label for="">Colonia:</label>
        <input type="text" name="colony" class="form-control">
        <br>
        <label for="">Direccion:</label>
        <input type="text" name="address" class="form-control">
        <br>
        <label for="">Celular:</label>
        <input type="text" name="cellphone" class="form-control">
        <br>
        <label for="">Deuda:</label>
        <input type="number" name="debt" class="form-control" required>
        <br>
        <label for="">Comentarios:</label>
        <input type="text" name="debt_comment" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection