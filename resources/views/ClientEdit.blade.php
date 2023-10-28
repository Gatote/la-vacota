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
@endsection
