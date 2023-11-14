@if ($quantityOfProducts > 0)
    <div class="form-group">
        <!-- {!! Form::label('id_sale', 'ID de Venta:', ['class' => 'form-label']) !!} -->
        <select name="id_sale" class="form-control" hidden>
            <option value="{{ $saleId }}">{{ $saleId }}</option>
        </select>
        <input name="quantityOfProducts" class="form-control" value = $quantityOfProducts hidden>
    </div>
@endif

<div id="product-select-container">
    @for ($i = 0; $i < $quantityOfProducts; $i++)
        <div class="form-group" style="display: flex; justify-content: space-between;">
            <label for="products[]">Producto {{ $i + 1 }}:</label>
            <select name="products[]" class="form-control" multiple>
                @foreach($products as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            <label for="quantity_sold[]">Cantidad vendida:</label>
            <input type="number" name="quantity_sold[]" class="form-control" style="width: 50px;" min="1" value="1" />
        </div>
    @endfor
</div>

