@if ($quantityOfProducts > 0)
    <div class="form-group">
        <select name="id_sale" class="form-control" hidden>
            <option value="{{ $saleId }}">{{ $saleId }}</option>
        </select>
        <input name="quantityOfProducts" class="form-control" value="{{ $quantityOfProducts }}" hidden>
    </div>
@endif

<div id="product-select-container">
    @for ($i = 0; $i < $quantityOfProducts; $i++)
        <div class="form-group" style="display: flex; justify-content: space-between;">
            <label for="products[]">Producto {{ $i + 1 }}:</label>
            <select name="products[]" class="form-control">
                @foreach($products as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            <label for="quantity_sold[]">Cantidad vendida:</label>
            <div style="display: flex; align-items: center;">
                <button type="button" class="btn btn-secondary" onclick="decrementQuantity(this)">-</button>
                <input type="number" name="quantity_sold[]" class="form-control" style="width: 50px;" min="1" value="1" />
                <button type="button" class="btn btn-secondary" onclick="incrementQuantity(this)">+</button>
            </div>
        </div>
    @endfor
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function incrementQuantity(button) {
        var input = $(button).siblings('input[type="number"]');
        var value = parseInt(input.val()) || 0;
        input.val(value + 1);
    }

    function decrementQuantity(button) {
        var input = $(button).siblings('input[type="number"]');
        var value = parseInt(input.val()) || 0;
        if (value > 1) {
            input.val(value - 1);
        }
    }
</script>
