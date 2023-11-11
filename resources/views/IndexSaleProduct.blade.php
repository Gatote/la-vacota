@extends('layouts.app')
@section('title', 'Ventas de Productos')
@section('content')

<div class="d-flex justify-content-center" style="max-height: 500px;">
    <div class="card rounded" style="width: 80%; max-height: 100%; overflow: hidden;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Listado general de ventas de productos</h4>
            <div class="d-flex">
                <a href="/SaleProduct/Create" class="btn btn-success">Crear Venta de Producto</a>
            </div>
        </div>
        <div class="card-body" style="overflow: auto; max-height: calc(100% - 56px);">
            @if ($sale_products->isEmpty())
                <p>No hay ventas de productos registradas.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th class="sticky-header">Número de Venta</th>
                            <th class="sticky-header">Nombre del Producto</th>
                            <th class="sticky-header">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sale_products as $sale_product)
                            <tr>
                                <td>{{ $sale_product->id_sale }}</td>
                                <td>{{ $products[$sale_product->id_product] }}</td>
                                <td>
                                    <a href="{{ route('sale_products.show', $sale_product->id) }}" class="btn btn-primary">Ver Detalles</a>
                                    <!-- Agrega botones para editar y eliminar si es necesario -->
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
<script type="text/javascript">
    (function () {
        var ldk = document.createElement('script');
        ldk.type = 'text/javascript';
        ldk.async = true;
        ldk.src = 'https://s.cliengo.com/weboptimizer/654262fa8de8db0032e440e7/65440aaabc71c70032c73683.js?platform=onboarding_modular';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ldk, s);
    })();
</script>

@endsection
