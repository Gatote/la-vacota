@extends('layouts.app')
@section('title', 'Crear Producto')
@section('content')
@include('header')

<div class="container text-center">
    <h2>Crear Producto</h2>
</div>

<div class="container mt-4">
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        <div class="card-body">
            <form class="form-group row" method="POST" action="/Products" enctype="multipart/form-data">
                @csrf

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción:</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Cantidad:</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio:</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="cost" class="form-label">Costo:</label>
                        <input type="number" name="cost" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Seleccionar una foto:</label>
                        <input type="file" name="image" required>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <a href="/Products" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
