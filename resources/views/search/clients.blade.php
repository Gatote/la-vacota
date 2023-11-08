@extends('layouts.app')
@section('title', 'Resultados de Búsqueda')
@section('content')

<div class="d-flex justify-content-center" style="max-height: 600px;">
    <div class="card rounded" style="width: 80%; max-height: 100%; overflow: hidden;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <form action="{{ route('search.clients') }}" method="GET">
                <input type="text" name="query" placeholder="Buscar...">
                <button type="submit">Buscar</button>
            </form>
            @if (request()->has('query') && !empty(request('query')))
                <h4>Mostrando resultados para {{ request('query') }}</h4>
            @else
                <h4>Listado general de clientes</h4>
            @endif
            <div class="d-flex">
                <a href="/Client/Create" class="btn btn-success">Crear Cliente</a>
                <a href="{{ route('Clients.pdf', ['query' => request('query')]) }}" class="btn btn-primary ml-2">Descargar PDF de Clientes</a>
            </div>
        </div>
        <div class="card-body" style="overflow: auto; max-height: calc(100% - 56px);">
            @if ($results->isEmpty())
                <p>No se encontraron resultados para la consulta: <strong>{{ request('query') }}</strong></p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th class="sticky-header">Nombre</th>
                            <th class="sticky-header">Colonia</th>
                            <th class="sticky-header">Dirección</th>
                            <th class="sticky-header">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $client)
                            <tr>
                                <td>{{ $client->name }} {{ $client->lastname }}</td>
                                <td>{{ $client->colony }}</td>
                                <td>{{ $client->comment }}</td>
                                <td>
                                    <a href="{{ route('clients.show', $client->id) }}" class="btn btn-primary">Ver Detalles</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

<!-- Código de instalación Cliengo para la-vacota.com -->
<script type="text/javascript">(function () {
    var ldk = document.createElement('script');
    ldk.type = 'text/javascript';
    ldk.async = true;
    ldk.src = 'https://s.cliengo.com/weboptimizer/654262fa8de8db0032e440e7/65440aaabc71c70032c73683.js?platform=onboarding_modular';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ldk, s);
})();
</script>

@endsection
