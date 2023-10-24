<div class="col-md-6">
    <div class="mb-3">
        {!! Form::label('name', 'Nombre', ['class' => 'form-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('description', 'Descripción', ['class' => 'form-label']) !!}
        {!! Form::text('description', null, ['class' => 'form-control']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('quantity', 'Cantidad', ['class' => 'form-label']) !!}
        {!! Form::number('quantity', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="col-md-6">
    <div class="mb-3">
        {!! Form::label('price', 'Precio', ['class' => 'form-label']) !!}
        {!! Form::number('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('cost', 'Costo', ['class' => 'form-label']) !!}
        {!! Form::number('cost', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('image', 'Seleccionar una foto', ['class' => 'form-label']) !!}
        {!! Form::file('image', ['required']) !!}
    </div>
</div>
<div class="col-md-12 text-center">
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    {!! Form::submit('Guardar Producto', ['class' => 'btn btn-primary']) !!}
</div>
