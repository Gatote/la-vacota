@extends('layouts.app')
@section('title','Sale Create')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->
<form class="form-group" method="POST" action="/Sales"> 
    @csrf 
    <div clas="form-group">
        <label for="">Fecha:</label>
        <input type="date" name="date" class="form-control">
        <br>
        <label for="">Id de cliente:</label>
        <input type="number" name="id_client" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection