@extends('layouts.app')
@section('title', 'Sales')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->
<p>Listado de ventas</p>

@foreach ($sales as $sale)
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Número de venta: {{$sale->id}}</h5>
  </div>
  <ul class="list-group list-group-flush">
    <!-- <li class="list-group-item">Número de cliente: {{$sale->id_client}}</li> -->
    <li class="list-group-item">Fecha: {{$sale->date}}</li>
  </ul>
    <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-primary">Ver Detalles</a>
    <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-success">Editar</a>
    <form method="POST" action="{{ route('sales.destroy', $sale->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
</div>
<br>
@endforeach

@endsection

