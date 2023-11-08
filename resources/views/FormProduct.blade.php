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
    @if(isset($product) && $product->image)
        <div class="mb-3">
            {!! Form::label('current_image', 'Imagen actual:', ['class' => 'form-label']) !!}
            <img src="{{ asset('images/' . $product->image) }}" alt="Imagen actual" class="img-thumbnail" style="max-width: 200px;">
        </div>
    @endif
    <div class="mb-3">
        {!! Form::label('image', 'Seleccionar una foto', ['class' => 'form-label']) !!}
        {!! Form::file('image', isset($product) ? [] : ['required']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('price', 'Precio', ['class' => 'form-label']) !!}
        {!! Form::number('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('cost', 'Costo', ['class' => 'form-label']) !!}
        {!! Form::number('cost', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
        
    <!-- Alerta para mostrar si el precio es menor que el costo -->
    <div id="priceAlert" class="alert alert-danger" style="display: none;">
        El precio es menor que el costo.
    </div>
</div>
<div class="col-md-12 text-center">
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    {!! Form::submit(isset($product) ? 'Guardar Producto' : 'Crear Producto', ['class' => 'btn btn-primary']) !!}
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('form').addEventListener('submit', function (event) {
            const price = parseFloat(document.querySelector('input[name="price"]').value);
            const cost = parseFloat(document.querySelector('input[name="cost"]').value);
            const priceAlert = document.querySelector('#priceAlert');

            if (price < cost) {
                priceAlert.style.display = 'block';
                
            } else {
                priceAlert.style.display = 'none';
            }
        });
    });
</script>
