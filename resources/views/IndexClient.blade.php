@extends('layouts.app')
@section('title', 'Clientes')
@section('content')

<h2>Listado de clientes</h2>

<form action="{{ route('search/client') }}" method="GET">
    <input type="text" name="query" placeholder="Buscar...">
    <button type="submit">Buscar</button>
</form>


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
<a href="/Client/Create" class="btn btn-success btn-block">Crear Cliente</a>
<a href="{{ route('Clients.pdf') }}" class="btn btn-primary">Descargar PDF de Clientes</a>

@endsection
