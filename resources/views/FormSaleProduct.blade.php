
<div class="form-group">
    {!! Form::label('quantity_of_products', 'Cantidad de productos:', ['class' => 'form-label']) !!}
    {!! Form::number('quantity_of_products', $quantity, ['class' => 'form-control', 'id' => 'quantity_of_products']) !!}
</div>


@if ($quantity > 0)
    <div class="form-group">
        {!! Form::label('id_sale', 'ID de Venta:', ['class' => 'form-label']) !!}
        <select name="id_sale" class="form-control">
            @foreach($sales as $id)
                <option value="{{ $id }}">{{ $id }}</option>
            @endforeach
        </select>
    </div>
@endif
<div id="product-select-container">
    @for ($i = 0; $i < $quantity; $i++)
        <div class="form-group" style="display: flex; justify-content: space-between;">
            <label for="products[]">Producto {{ $i + 1 }}:</label>
            <select name="products[]" class="form-control">
                @foreach($products as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            <label for="quantity_sold[]">Cantidad vendida:</label>
            <input type="number" name="quantity_sold[]" class="form-control" style="width: 50px;" />
        </div>
    @endfor
</div>

