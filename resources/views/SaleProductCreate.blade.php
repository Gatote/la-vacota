@extends('layouts.app')
@section('title','Sale Product Create')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->
<form class="form-group" method="POST" action="/SaleProducts"> 
    @csrf 
    <div clas="form-group">
        <label for="">Id de venta:</label>
        <input type="number" name="id_sale" class="form-control">
        <br>
        <label for="">Id de producto:</label>
        <input type="number" name="id_product" class="form-control">
        <br>
        <label for="">Cantidad:</label>
        <input type="number" name="quantity" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection