@extends('layouts.app')
@section('title', 'Detalles de Venta')
@section('content')

<div class="container text-center">
    <h2>Detalles de Venta</h2>
</div>

<div class="container mt-4">
    <div class="card" style="max-width: 400px; margin: 0 auto;">
        <div class="card-body">
            <h5 class="card-title">Número de Venta: {{$sale->id}}</h5>
            <ul class="list-group">
                <li class="list-group-item">Número de Cliente: {{$sale->id_client}}</li>
                <li class="list-group-item">Fecha: {{$sale->date}}</li>
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-success">Editar</a>
            <form method="POST" action="{{ route('sales.destroy', $sale->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <a href="/Sales" class="btn btn-primary">Volver a la lista de ventas</a>
</div>
@endsection
