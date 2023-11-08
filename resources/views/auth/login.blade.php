@extends('layouts.app')
<style>
.custom-card {
    border: none; /* Elimina el borde del card */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Agrega sombra */
    border-radius: 10px; /* Borde redondeado */
    overflow: hidden; /* Para que la isla no se desborde */
}

.custom-header {
    background-color: #007bff; /* Color de fondo del encabezado */
    color: #fff; /* Color del texto en el encabezado */
    text-align: center; /* Centra el texto del encabezado */
    padding: 20px; /* Espaciado interno en el encabezado */
    position: relative; /* Para superponer el logo */
}

.custom-header img {
    max-width: 150px; /* Tamaño del logo (ajusta según tus necesidades) */
    position: absolute; /* Posición absoluta para superponer */
    top: 120%; /* Mueve el logo hacia abajo (ajusta según tus necesidades) */
    left: 50%; /* Centra horizontalmente */
    transform: translate(-50%, 0%); /* Centra el logo en el centro del encabezado */
}

.custom-card-body {
    padding: 20px; /* Espaciado interno del cuerpo del formulario */
}

.login-form {
    text-align: center; /* Centra el contenido del formulario */
}

</style>


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card custom-card">
                <div class="card-header custom-header">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Logo">
                    {{ __('Login') }}
                </div>
                <br><br><br><br><br><br>

                <div class="card-body custom-card-body">
                    <div class="login-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>

                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="form-group">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
