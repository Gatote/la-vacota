<div class="form-group">
    {!! Form::label('id_sale', 'ID de Venta:', ['class' => 'form-label']) !!}
    <select name="id_sale" class="form-control">
        @foreach($sales as $id)
            <option value="{{ $id }}">{{ $id }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::label('id_product', 'Producto:', ['class' => 'form-label']) !!}
    <select name="id_product" class="form-control">
        @foreach($products as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::label('quantity', 'Cantidad:', ['class' => 'form-label']) !!}
    {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
</div>
