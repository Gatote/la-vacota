@section('title', 'Detalles de Venta')
@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles de Venta - La Vacota de la Batea</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            max-width: 200px;
        }
        .address {
            text-align: center;
            font-size: 12px;
            margin-top: 10px;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .card {
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        .card-title {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        .list-group-item {
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/logo.jpeg') }}" alt="Logo" class="logo">
        <h1>LA VACOTA DE LA BATEA</h1>
        <p>Elaborado por Eva Hamm Klassen</p>
    </div>
    <div class="address">
        <p>Campo Menonita No. 2 La Batea</p>
        <p>Municipio de Sombrerete, Zacatecas</p>
    </div>
    <div class="container mt-4">
    <div class="card">  
        <div class="card-body">
            <h5 class="card-title">Número de Venta: {{ $sale->id }}</h5>
            <ul class="list-group">
                <li class="list-group-item">Cliente: {{ $client->name }} {{ $client->lastname }}</li>
                <li class="list-group-item">Fecha: {{ $sale->date }}</li>
                <li class="list-group-item">Productos Vendidos:
                    <table class="table text-center"> <!-- Agregado: text-center -->
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sale->saleProducts as $sale_product)
                                <tr>
                                    <td>{{ $sale_product->product->name }}</td>
                                    <td>${{ $sale_product->product->price }}</td>
                                    <td>{{ $sale_product->quantity }}</td>
                                    <td>${{ $sale_product->product->price * $sale_product->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </li>
            </ul>
            <div class="total">
                <h5>Total de la Venta: ${{ $sale->saleProducts->sum(function($sale_product) {
                    return $sale_product->product->price * $sale_product->quantity;
                }) }}</h5>
            </div>
        </div>
    </div>
</div>  