@extends('layouts.app')
@section('title', 'Nueva Venta')
@section('content')

<div class="container text-center">
    <h2>Nueva Venta</h2>
</div>

<div class="container mt-4">
    <div class="card" style="max-width: 400px; margin: 0 auto;">
        <div class="card-body">
            <form class="form-group" method="POST" action="/Sales">
                @csrf
                <div class="mb-3">
                    <label for="date">Fecha:</label>
                    <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="mb-3">
                    <label for="id_client">Número de Cliente:</label>
                    <select name="id_client" class="form-control">
                        @foreach($clientIds as $clientId)
                            <option value="{{ $clientId }}">{{ $clientId }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <a href="/Sales" class="btn btn-primary">Volver a la lista de ventas</a>
</div>
@endsection
