@extends('layouts.app')
@section('title','Sale Create')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->
<form class="form-group" method="POST" action="/Sales"> 
    @csrf 
    <div class="form-group">
        <label for="date">Fecha:</label>
        <input type="date" name="date" class="form-control">
    </div>
    <div class="form-group">
        <label for="id_client">Id de cliente:</label>
        <select name="id_client" class="form-control">
            @foreach($clientIds as $clientId)
                <option value="{{ $clientId }}">{{ $clientId }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
