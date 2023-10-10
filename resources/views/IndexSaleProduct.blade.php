@extends('layouts.app')
@section('title', 'Sale Products')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->
<p>Listado de ventas con sus productos</p>

@foreach ($sale_products as $sale_product)
<div class="card" style="width: 18rem;">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">Número de venta: {{$sale_product->id}}</h5>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Número de producto: {{$sale_product->id_product}}</li>
    <li class="list-group-item">Cantidad: {{$sale_product->quantity}}</li>
  </ul>
  <!-- <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div> -->
</div>
<br>
@endforeach

@endsection

