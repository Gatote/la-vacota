<!DOCTYPE html>
<html>
<head>
    <title>Listado de Clientes</title>
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
        <p>Elaborado por Eva Hamm Klassen (dueño/gerente)</p>
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
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Colonia</th>
                <th>Dirección</th>
                <th>Celular</th>
                <th>Deuda</th>
                <th>Comentarios</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->lastname }}</td>
                    <td>{{ $client->colony }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->cellphone }}</td>
                    <td>{{ $client->debt }}</td>
                    <td>{{ $client->comment }}</td>
                    <td>
                        <img src="{{ public_path('images/' . $client->image) }}" alt="{{ $client->name }}" width="100">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
