@extends('layouts.app')
@section('title', 'Nueva Venta')
@section('content')

<div class="container text-center">
    <h2>Nueva Venta</h2>
</div>

<div class="container mt-4">
    <div class="card" style="max-width: 400px; margin: 0 auto;">
        <div class="card-body">
            {!! Form::open(['route' => 'sales.store', 'method' => 'POST']) !!}
                @include('FormSale')
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <a href="{{ route('sales.index') }}" class="btn btn-primary">Volver a la lista de ventas</a>
</div>
@endsection
