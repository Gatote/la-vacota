<div class="mb-3">
    {!! Form::label('date', 'Fecha:', ['class' => 'form-label']) !!}
    {!! Form::date('date', date('Y-m-d'), ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<div class="mb-3">
    {!! Form::label('id_client', 'Nombre del Cliente:', ['class' => 'form-label']) !!}
    <select name="id_client" class="form-control">
        @foreach($clients as $client)
            <option value="{{ $client->id }}">{{ $client->name . ' ' . $client->lastname }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    {!! Form::label('quantity_of_products', 'Cantidad de Productos:', ['class' => 'form-label']) !!}
    {!! Form::number('quantity_of_products', old('quantity_of_products', 0), ['class' => 'form-control']) !!}
</div>
<div class="text-center">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
