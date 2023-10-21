@extends('layouts.app')
@section('title', 'Clientes')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->

<h2>Listado de clientes</h2>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Colonia</th>
            <th>Dirección</th>
            <th>Celular</th>
            <th>Deuda</th>
            <th>Comentarios</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }} {{ $client->lastname }}</td>
                <td>{{ $client->colony }}</td>
                <td>{{ $client->address }}</td>
                <td>{{ $client->cellphone }}</td>
                <td>{{ $client->debt }}</td>
                <td>{{ $client->comment }}</td>
                <td>
                    <!-- Agregar botón para mostrar detalles del cliente -->
                    <a href="{{ route('clients.show', $client->id) }}" class="btn btn-primary">Ver Detalles</a>
    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
