@extends('layouts.app')
@section('title','Client Create')
@section('content')
@include('header') <!-- Incluye el archivo header.php -->
<div class="container text-center">
    <h2>Crear Cliente</h2>
</div>
<div class="container mt-4">
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        <div class="card-body">
            <form class="form-group row" method="POST" action="/Clients" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Apellido:</label>
                        <input type="text" name="lastname" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="colony" class="form-label">Colonia:</label>
                        <input type="text" name="colony" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Dirección:</label>
                        <input type="text" name="address" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="cellphone" class="form-label">Celular:</label>
                        <input type="text" name="cellphone" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="debt" class="form-label">Deuda:</label>
                        <input type="number" name="debt" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="debt_comment" class="form-label">Comentarios:</label>
                        <input type="text" name="debt_comment" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Seleccionar una foto (opcional):</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <a href="/Clients" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
