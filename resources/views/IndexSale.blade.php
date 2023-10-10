@extends('layouts.app')
@section('title', 'Sales')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->
<p>Listado de ventas</p>

@foreach ($sales as $sale)
<div class="card" style="width: 18rem;">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">Número de venta: {{$sale->id}}</h5>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Número de cliente: {{$sale->id_client}}</li>
    <li class="list-group-item">Fecha: {{$sale->date}}</li>
  </ul>
  <!-- <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div> -->
</div>
<br>
@endforeach

@endsection

