@extends('layouts.app')
@section('title', 'Trainers')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->
<p>Listado de clientes</p>

@foreach ($clients as $client)
<div class="card" style="width: 18rem;">
    <img src="/images/{{$client->image}}" class="card-img-top img-fluid" alt="{{$client->name}} {{$client->lastname}}" style="max-width: 300px; max-height: 300px;">
    <div class="card-body">
        <h5 class="card-title">{{$client->id}}: {{$client->name}} {{$client->lastname}}</h5>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Colonia: {{$client->colony}}</li>
        <li class="list-group-item">Direccion: {{$client->address}}</li>
        <li class="list-group-item">Celular: {{$client->cellphone}}</li>
        <li class="list-group-item">Deuda: {{$client->debt}}</li>
        <li class="list-group-item">Comentarios: {{$client->comment}}</li>
    </ul>
</div>

<br>
@endforeach

@endsection

