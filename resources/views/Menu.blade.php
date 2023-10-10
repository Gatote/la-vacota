@include('login')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La vacota</title>
    <!-- Agrega la referencia a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Página de Gestión la vacota</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">Clientes</h2>
                        <a href="/Clients" class="btn btn-primary btn-block">Ver Lista de Clientes</a>
                        <a href="/Client/Create" class="btn btn-success btn-block">Crear Cliente</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">Productos</h2>
                        <a href="/Products" class="btn btn-primary btn-block">Ver Lista de Productos</a>
                        <a href="/Product/Create" class="btn btn-success btn-block">Crear Producto</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">Ventas</h2>
                        <a href="/Sales" class="btn btn-primary btn-block">Ver Lista de Ventas</a>
                        <a href="/Sale/Create" class="btn btn-success btn-block">Crear Venta</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">Venta de Productos</h2>
                        <a href="/SaleProducts" class="btn btn-primary btn-block">Ver Lista de Ventas de Productos</a>
                        <a href="/SaleProduct/Create" class="btn btn-success btn-block">Crear Venta de Producto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Agrega la referencia a Bootstrap JS (opcional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
