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
<!-- Código de instalación Cliengo para la-vacota.com --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/654262fa8de8db0032e440e7/65440aaabc71c70032c73683.js?platform=onboarding_modular'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>

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
