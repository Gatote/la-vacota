@extends('layouts.app')
@section('title', 'Client Create')
@section('content')
<div class="container text-center">
    <h2>Crear Cliente</h2>
</div>
<div class="container mt-4">
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        
        <div class="card-body">
                {!! Form::open(['route' => 'Clients.store', 'method' => 'POST', 'files' => true]) !!}
            @include("FormClient")
    </div>
</div>
@endsection
