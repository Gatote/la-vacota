<!DOCTYPE html>
<html>
<head>
    <title>Listado de Productos</title>
    <style>
        /* Agrega estilos personalizados si es necesario */
        .header {
            text-align: center;
        }
        .logo {
            max-width: 200px; /* Ajusta el ancho según tus necesidades */
        }
        .address {
            text-align: center;
            font-size: 12px;
            margin-top: 10px;
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

    @if (!empty($query))
        <p>Consulta actual: {{ $query }}</p>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Costo</th>
                <th>Ganancia</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <!-- <td>{{ $product->id }}</td> -->
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ $product->price }}</td>
                    <td>${{ $product->cost }}</td>
                    <td>${{ $product->profit }}</td>
                    <td>
            @if (pathinfo($product->image, PATHINFO_EXTENSION) == 'jpg')
                <img src="{{ public_path('images/' . $product->image) }}" alt="{{ $product->name }}" width="100">
            @endif
        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
