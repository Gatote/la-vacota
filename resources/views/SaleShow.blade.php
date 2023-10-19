@extends('layouts.app')
@section('title', 'Sales')
@section('content')
@include('header')

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Número de venta: {{$sale->id}}</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Número de cliente: {{$sale->id_client}}</li>
    <li class="list-group-item">Fecha: {{$sale->date}}</li>
  </ul>
</div>
<a href="/Sales" class="btn btn-primary">Volver a la lista de ventas</a>
@endsection
