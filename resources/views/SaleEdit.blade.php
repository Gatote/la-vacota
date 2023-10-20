@extends('layouts.app')
@section('title', 'Crear Venta')
@section('content')
@include('header')
<form class="form-group" method="POST" action="{{ route('sales.update', $sale->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Agrega esta línea -->
    <div class="form-group">
        <label for="date">Fecha:</label>
        <input type="date" name="date" class="form-control" value="{{ $sale->date ?? date('Y-m-d') }}">
    </div>
    <div class="form-group">
        <label for="id_client">Id de cliente:</label>
        <select name="id_client" class="form-control">
            @foreach($clientIds as $clientId)
                <option value="{{ $clientId }}" {{ $clientId == $sale->client_id ? 'selected' : '' }}>{{ $clientId }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection

