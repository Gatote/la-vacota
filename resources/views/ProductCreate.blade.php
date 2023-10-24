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


<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('form').addEventListener('submit', function (event) {
            const price = parseFloat(document.querySelector('input[name="price"]').value);
            const cost = parseFloat(document.querySelector('input[name="cost"]').value);
            const priceAlert = document.querySelector('#priceAlert');

            if (price < cost) {
                priceAlert.style.display = 'block';
                event.preventDefault(); // Evita el envío del formulario
            } else {
                priceAlert.style.display = 'none';
            }
        });
    });
</script>
