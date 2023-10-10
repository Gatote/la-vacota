@extends('layouts.app')
@section('title', 'Trainers')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->
<p>Listado de clientes</p>

@foreach ($clients as $client)
<div class="card" style="width: 18rem;">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">{{$client->id}}: {{$client->name}} {{$client->lastname}}</h5>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Colonia: {{$client->colony}}</li>
    <li class="list-group-item">Direccion: {{$client->address}}</li>
    <li class="list-group-item">Celular: {{$client->cellphone}}</li>
    <li class="list-group-item">Deuda: {{$client->address}}</li>
    <li class="list-group-item">Comentarios: {{$client->comment}}</li>
  </ul>
  <!-- <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div> -->
</div>
<br>
@endforeach

@endsection

