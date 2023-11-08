@include('login')


<!DOCTYPE html>

<style>
.botones {
  width: 100%;
  text-align: center;
}

.separar {
  padding: 3%;
  display: inline-block;
  cursor: pointer;
}

.titulo {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
  text-decoration: underline;
  color: #333333;
}

.boton {
  color: #fff !important;
  font-size: 20px;
  font-weight: 500;
  padding: 0.5em 1.2em;
  background: #318aac;
  border: 2px solid;
  border-color: #318aac;
  position: relative;
}
.boton:before {
  content:"";
  position: absolute;
  top: 0px;
  left: 0px;
  width: 0px;
  height: 100%;
  background: rgba(255, 255, 255, 0.1);
  transition: all 1s ease;
}
.boton:hover:before {
width: 100%;
}

.boton2 {
  color: #fff !important;
  font-size: 20px;
  font-weight: 500;
  padding: 0.5em 1.2em;
  background: #318aac;
  border: 2px solid;
  border-color: #318aac;
  position: relative;
}
.boton2:before {
  content:"";
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 0px;
  background: rgba(255, 255, 255, 0.1);
  transition: all 1s ease;
} 
.boton2:hover:before {
  height: 100%;
}

.boton3 {
  color: #318aac !important;
  font-size: 20px;
  font-weight: 500;
  padding: 0.5em 1.2em;
  background: rgba(0,0,0,0);
  border: 2px solid;
  border-color: #318aac;
  transition: all 1s ease;
  position: relative;
}
.boton3:hover {
  background: #318aac;
  color: #fff !important;
}

.boton4 {
  color: rgba(255, 255, 255, 0.9) !important;
  font-size: 20px;
  font-weight: 500;
  padding: 0.5em 1.2em;
  background: #318aac;
  border: 2px solid;
  border-color: #318aac;
  position: relative;
}
.boton4:hover {
  color: rgba(255, 255, 255, 1) !important;
  box-shadow: 0 4px 16px rgba(49, 138, 172, 1);
  transition: all 0.2s ease;
}

.boton5 {
  color: #fff !important;
  font-size: 20px;
  font-weight: 500;
  padding: 0.5em 1.2em;
  background: #318aac;
  position: relative;
  border: 2px solid #318aac;
  outline: 1px solid;
  outline-color: rgba(49, 138, 172, 0.4);
  transition: all 1s cubic-bezier(0.19, 1, 0.22, 1);
}
.boton5:hover {
  box-shadow: inset 0 0 20px rgba(49, 138, 172, 0.5), 0 0 20px rgba(49, 138, 172, 0.4);
  outline-color: rgba(49, 138, 172, 0);
  outline-offset: 80px;
  text-shadow: 1px 1px 6px #fff;
  border-shadow: 
}

</style>

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
<!-- 
        <section class=botones>
  <div class="separar">
    <h3 class=titulo> Overlay Horizontal:<h3><br/>
    <span class="boton">Probar Hover</span>
  </div>
  <div class="separar">
    <h3 class=titulo> Overlay Vertical:<h3><br/>
    <span class="boton2">Probar Hover</span>
  </div>
  <div class="separar">
    <h3 class=titulo> Relleno de Color:<h3><br/>
    <span class="boton3">Probar Hover</span>
  </div>
  <div class="separar">
    <h3 class=titulo> Efecto Resplandor:<h3><br/>
    <span class="boton4">Probar Hover</span>
  </div>
  <div class="separar">
    <h3 class=titulo> Efecto Resplandor 2:<h3><br/>
    <span class="boton5">Probar Hover</span>
  </div>     
</section> -->


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

<!-- Código de instalación Cliengo para la-vacota.com --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/654262fa8de8db0032e440e7/65440aaabc71c70032c73683.js?platform=onboarding_modular'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>

</body>
</html>
