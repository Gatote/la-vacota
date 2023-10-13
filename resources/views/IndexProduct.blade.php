@extends('layouts.app')
@section('title', 'Trainers')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->
<p>Listado de productos</p>

@foreach ($products as $product)
<div class="card" style="width: 18rem;">
  <img src="/images/{{$product->image}}" class="card-img-top img-fluid" alt="{{$product->name}} {{$product->lastname}}" style="max-width: 300px; max-height: 300px;">  
  <div class="card-body">
    <h5 class="card-title">{{$product->id}}: {{$product->name}}</h5>
    <p class="card-text">{{$product->description}}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Precio: ${{$product->price}}</li>
    <li class="list-group-item">Costo: ${{$product->cost}}</li>
    <li class="list-group-item">Ganancia: ${{$product->profit}}</li>
  </ul>
</div>
<br>
@endforeach

@endsection

