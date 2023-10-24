@extends('layouts.app')
@section('title', 'Editar Producto')
@section('content')
<div class="container text-center">
    <h2>Editar Producto</h2>
</div>
<div class="container mt-4">
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        <div class="card-body">
            {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PUT', 'files' => true]) !!}
                @include('FormProduct')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
