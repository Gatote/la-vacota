@extends('layouts.app')
@section('title', 'Editar Producto')
@section('content')

<div class="container text-center">
    <h2>Editar Producto</h2>
</div>

<div class="container mt-4">
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        <div class="card-body">
            <form class="form-group row" method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre:</label>
                        <input type="text" name="name" class="form-control" value="{{$product->name}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción:</label>
                        <input type="text" name="description" class="form-control" value="{{$product->description}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio:</label>
                        <input type="number" name="price" class="form-control" value="{{$product->price}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="cost" class="form-label">Costo:</label>
                        <input type="number" name="cost" class="form-control" value="{{$product->cost}}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- <div class="mb-3">
                        <label for="profit" class="form-label">Ganancia:</label>
                        <input type="number" name="profit" class="form-control" value="{{$product->profit}}" required>
                    </div> -->
                    @if($product->image)
                    <div class="mb-2">
                        <label>Imagen actual:</label>
                        <img src="{{ asset('images/' . $product->image) }}" alt="Imagen actual" class="img-thumbnail" style="max-width: 200px;">
                    </div>
                    @endif
                    <div class="mb-3">
                        <label for="image" class="form-label">Seleccionar una foto nueva (opcional):</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
