@extends('layouts.app')
@section('title', 'Editar Cliente')
@section('content')
@include('header')

<form class="form-group" method="POST" action="{{ route('clients.update', $client->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT') {{-- Usa el método PUT para actualización --}}

    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" name="name" class="form-control" value="{{$client->name}}" required>
        <br>
        <label for="lastname">Apellido:</label>
        <input type="text" name="lastname" class="form-control" value="{{$client->lastname}}" required>
        <br>
        <label for="colony">Colonia:</label>
        <input type="text" name="colony" class="form-control" value="{{$client->colony}}">
        <br>
        <label for="address">Dirección:</label>
        <input type="text" name="address" class="form-control" value="{{$client->address}}">
        <br>
        <label for="cellphone">Celular:</label>
        <input type="text" name="cellphone" class="form-control" value="{{$client->cellphone}}">
        <br>
        <label for="debt">Deuda:</label>
        <input type="number" name="debt" class="form-control" value="{{$client->debt}}" required>
        <br>
        <label for="debt_comment">Comentarios:</label>
        <input type="text" name="debt_comment" class="form-control" value="{{$client->debt_comment}}">
        <br>
        <div class="form-group">
            @if($client->image)
            <div class="mb-2">
                <label>Imagen actual:</label>
                <img src="{{ asset('images/' . $client->image) }}" alt="Imagen actual" class="img-thumbnail" style="max-width: 200px;">
            </div>
            @endif

            <label for="image">Seleccionar una foto nueva (opcional):</label>
            <input type="file" name="image">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
</form>
@endsection
