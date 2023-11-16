@include('login')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Vacota - Página de Gestión</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #333;
        }

        .btn-custom {
            color: #fff !important;
            font-size: 18px;
            font-weight: 500;
            padding: 0.8em 1.5em;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #318aac;
        }

        .btn-success.btn-custom {
            color: #fff !important;
            background-color: #28a745; /* Green color for success button */
            border-color: #28a745; /* Border color for success button */
        }

        .btn-primary.btn-custom {
            background-color: #007bff; /* Blue color for primary button */
            border-color: #007bff; /* Border color for primary button */
        }

        .btn-info.btn-custom {
            background-color: #17a2b8; /* Info color for info button */
            border-color: #17a2b8; /* Border color for info button */
        }

        /* Centering the third card */
        .row.justify-content-center .col-md-6 {
            margin-top: 20px; /* Adjust top margin for better spacing */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Página de Gestión La Vacota</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Clientes</h2>
                        <a href="/Clients" class="btn btn-primary btn-custom btn-block">Ver Lista de Clientes</a>
                        <a href="/Client/Create" class="btn btn-success btn-custom btn-block">Crear Cliente</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Productos</h2>
                        <a href="/Products" class="btn btn-primary btn-custom btn-block">Ver Lista de Productos</a>
                        <a href="/Product/Create" class="btn btn-success btn-custom btn-block">Crear Producto</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center"> <!-- Centering the third card -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Ventas</h2>
                        <a href="/Sales" class="btn btn-primary btn-custom btn-block">Ver Lista de Ventas</a>
                        <a href="/Sale/Create" class="btn btn-success btn-custom btn-block">Crear Venta</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!-- Código de instalación Cliengo para la-vacota.com --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/654262fa8de8db0032e440e7/65440aaabc71c70032c73683.js?platform=onboarding_modular'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>

