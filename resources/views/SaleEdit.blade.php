@extends('layouts.app')
@section('title', 'Editar Venta')
@section('content')

<div class="container text-center">
    <h2>Editar Venta</h2>
</div>

<div class="container mt-4">
    <div class="card" style="max-width: 400px; margin: 0 auto;">
        <div class="card-body">
            <form class="form-group" method="POST" action="{{ route('sales.update', $sale->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Agrega esta línea -->
                <div class="mb-3">
                    <label for="date">Fecha:</label>
                    <input type="date" name="date" class="form-control" value="{{ $sale->date ?? date('Y-m-d') }}" required>
                </div>
                <div class="mb-3">
                    <label for="id_client">Número de Cliente:</label>
                    <select name="id_client" class="form-control">
                        @foreach($clientIds as $clientId)
                            <option value="{{ $clientId }}" {{ $clientId == $sale->client_id ? 'selected' : '' }}>{{ $clientId }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

