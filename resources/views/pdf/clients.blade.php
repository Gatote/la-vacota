<!DOCTYPE html>
<html>
<head>
    <title>Listado de Clientes</title>
</head>
<body>
    <h2>Listado de clientes</h2>
    @if (!empty(request('query')))
        <p>Consulta actual: {{ request('query') }}</p>
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
                        <img src="{{ 'images/' . $client->image }}" alt="{{ $client->name }}" width="100">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
