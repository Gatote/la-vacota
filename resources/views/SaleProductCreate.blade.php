@extends('layouts.app')
@section('title', 'Crear Venta de Producto')
@section('content')

<div class="container text-center">
    <h2>Crear Venta de Producto</h2>
</div>

<div class="container mt-4">
    <!-- Agrega esto para mostrar los errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card" style="max-width: 400px; margin: 0 auto;">
        <div class="card-body">
            <form class="form-group" method="POST" action="{{ route('sale_products.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Agrega un campo oculto con el ID de la venta -->
                <input type="hidden" name="sale_id" value="{{ $saleId }}">
                @include('FormSaleProduct', ['quantity' => old('quantity_of_products', 0)])
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <a href="{{ route('sale_products.index') }}" class="btn btn-primary">Volver a la lista de ventas de productos</a>
</div>

<script type="text/javascript">
    // Tu código JavaScript, si es necesario, puede ir aquí
</script>
@endsection
