@extends('layouts.app')
@section('title', 'Crear Producto')
@section('content')

<div class="container text-center">
    <h2>Crear Producto</h2>
</div>

<div class="container mt-4">
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        <div class="card-body">
            {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'files' => true]) !!}
                @include('FormProduct')
            {!! Form::close() !!}
        </div>
    </div>
</div>



@endsection
