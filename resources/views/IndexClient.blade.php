@extends('layouts.app')
@section('title', 'Clientes')
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
    <!-- Agregar botón para mostrar detalles del cliente -->
    <a href="{{ route('clients.show', $client->id) }}" class="btn btn-primary">Ver Detalles</a>
    
    <!-- Agregar botón para editar el cliente -->
    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-success">Editar</a>
    
    <!-- Agregar el botón de eliminación -->
    <form method="POST" action="{{ route('clients.destroy', $client->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
</div>

<br>
@endforeach

@endsection

