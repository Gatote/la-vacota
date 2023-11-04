@extends('layouts.app')
@section('title', 'Editar Cliente')
@section('content')
<div class="container text-center">
    <h2>Editar Cliente</h2>
</div>
<div class="container mt-4">
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        <div class="card-body">
            {!! Form::model($client, ['route' => ['clients.update', $client->id], 'method' => 'PUT', 'files' => true]) !!}
            @include("FormClient")  
        </div>
    </div>
</div>
<!-- Código de instalación Cliengo para la-vacota.com --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/654262fa8de8db0032e440e7/65440aaabc71c70032c73683.js?platform=onboarding_modular'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>

@endsection
