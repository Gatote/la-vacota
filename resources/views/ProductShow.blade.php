@extends('layouts.app')
@section('title', 'Detalles del Producto')
@section('content')

<div class="container text-center">
    <h2>Detalles del Producto</h2>
</div>

<div class="container mt-4">
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/images/{{$product->image}}" class="img-fluid" alt="{{$product->name}}" style="max-width: 300px; max-height: 300px;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$product->id}}: {{$product->name}}</h5>
                    <p class="card-text">{{$product->description}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Precio: ${{$product->price}}</li>
                    <li class="list-group-item">Costo: ${{$product->cost}}</li>
                    <li class="list-group-item">Ganancia: ${{$product->profit}}</li>
                </ul>
                <div class="card-footer">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success">Editar</a>

                    <!-- Agregar el botón de eliminación -->
                    <form method="POST" action="{{ route('products.destroy', $product->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <a href="/Products" class="btn btn-primary">Volver a la lista de productos</a>
</div>
<!-- Código de instalación Cliengo para la-vacota.com --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/654262fa8de8db0032e440e7/65440aaabc71c70032c73683.js?platform=onboarding_modular'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>
@endsection
