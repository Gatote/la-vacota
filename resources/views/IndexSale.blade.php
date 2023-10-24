@extends('layouts.app')
@section('title', 'Ventas')
@section('content')
<style>
    /* Agrega el estilo CSS para limitar el ancho de la tabla */
    .table-limit-width {
        max-width: 100%;
    }
</style>

<h2>Listado de Ventas</h2>

<div class="table-responsive">
    <table class="table table-limit-width">
        <thead>
            <tr>
                <th>Número de Venta</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{$sale->id}}</td>
                    <td>{{$sale->date}}</td>
                    <td>
                        <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-primary">Ver Detalles</a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
                        <a href="/Sale/Create" class="btn btn-success btn-block">Crear Venta</a>

@endsection
