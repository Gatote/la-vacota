<div class="mb-3">
    {!! Form::label('date', 'Fecha:', ['class' => 'form-label']) !!}
    {!! Form::date('date', date('Y-m-d'), ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<div class="mb-3">
    {!! Form::label('id_client', 'Nombre del Cliente:', ['class' => 'form-label']) !!}
    {!! Form::select('id_client', $clients->pluck('name', 'id'), null, ['class' => 'form-control']) !!}
</div>

@if(!isset($quantity_of_products))
    <div class="mb-3">
        {!! Form::label('quantity_of_products', 'Cantidad de Productos:', ['class' => 'form-label']) !!}
        {!! Form::number('quantity_of_products', 1, ['class' => 'form-control', 'min' => 1]) !!}
    </div>
@endif

<div class="text-center">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
