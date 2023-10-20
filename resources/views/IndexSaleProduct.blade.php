@extends('layouts.app')
@section('title', 'Sale Products')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->
<p>Listado de ventas con sus productos</p>

@foreach ($sale_products as $sale_product)
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Número de venta: {{$sale_product->id}}</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Número de producto: {{$sale_product->id_product}}</li>
    <!-- <li class="list-group-item">Cantidad: {{$sale_product->quantity}}</li> -->
  </ul>
    <!-- Agregar botón para mostrar detalles del cliente -->
    <a href="{{ route('sale_products.show', $sale_product->id) }}" class="btn btn-primary">Ver Detalles</a>
    
    <!-- Agregar botón para editar el cliente -->
    <a href="{{ route('sale_products.edit', $sale_product->id) }}" class="btn btn-success">Editar</a>
    
    <!-- Agregar el botón de eliminación -->
    <form method="POST" action="{{ route('sale_products.destroy', $sale_product->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
    </form>
</div>
<br>
@endforeach

@endsection

