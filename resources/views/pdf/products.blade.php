@section('title', 'Listado de Productos')
@section('content')

<h2>Listado de productos</h2>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
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
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>${{ $product->price }}</td>
                <td>${{ $product->cost }}</td>
                <td>${{ $product->profit }}</td>
                <td>
                    <img src="images/{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 100px; max-height: 100px;">
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
