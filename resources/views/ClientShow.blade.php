@extends('layouts.app')
@section('title', 'Detalles del Cliente')
@section('content')

<div class="container text-center">
    <h2>Detalles del Cliente</h2>
</div>

<div class="container mt-4">
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/images/{{$client->image}}" class="img-fluid" alt="{{$client->name}} {{$client->lastname}}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$client->id}}: {{$client->name}} {{$client->lastname}}</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Colonia: {{$client->colony}}</li>
                        <li class="list-group-item">Direccion: {{$client->address}}</li>
                        <li class="list-group-item">Celular: {{$client->cellphone}}</li>
                        <li class="list-group-item">Deuda: {{$client->debt}}</li>
                        <li class="list-group-item">Comentarios: {{$client->comment}}</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-success">Editar</a>
    
                    <!-- Agregar el botón de eliminación -->
                    <form method="POST" action="{{ route('clients.destroy', $client->id) }}" style="display: inline;">
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
    <a href="/Clients" class="btn btn-primary">Volver a la lista de clientes</a>
</div>
<!-- Código de instalación Cliengo para la-vacota.com --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/654262fa8de8db0032e440e7/65440aaabc71c70032c73683.js?platform=onboarding_modular'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>

@endsection
