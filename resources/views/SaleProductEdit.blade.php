@extends('layouts.app')
@section('title', 'Editar Venta de Producto')
@section('content')

<div class="container text-center">
    <h2>Editar Venta de Producto</h2>
</div>

<div class = "container mt-4">
    <div class="card" style="max-width: 400px; margin: 0 auto;">
        <div class="card-body">
            <form class="form-group" method="POST" action="{{ route('sale_products.update', $sale_product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('FormSaleProduct')
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <a href="{{ route('sale_products.show', $sale_product->id) }}" class="btn btn-primary">Volver a la lista de ventas de productos</a>
</div>
<!-- Código de instalación Cliengo para la-vacota.com --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/654262fa8de8db0032e440e7/65440aaabc71c70032c73683.js?platform=onboarding_modular'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>
@endsection
