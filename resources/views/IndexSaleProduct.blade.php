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
    <li class="list-group-item">Cantidad: {{$sale_product->quantity}}</li>
  </ul>
</div>
<br>
@endforeach

@endsection

