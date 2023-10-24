
            <div class="col-md-6">
                <div class="mb-3">
                    {!! Form::label('name', 'Nombre', ['class' => 'form-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('lastname', 'Apellido', ['class' => 'form-label']) !!}
                    {!! Form::text('lastname', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('colony', 'Colonia', ['class' => 'form-label']) !!}
                    {!! Form::text('colony', null, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('address', 'Dirección', ['class' => 'form-label']) !!}
                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('cellphone', 'Celular', ['class' => 'form-label']) !!}
                    {!! Form::text('cellphone', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    {!! Form::label('debt', 'Deuda', ['class' => 'form-label']) !!}
                    {!! Form::number('debt', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('debt_comment', 'Comentarios', ['class' => 'form-label']) !!}
                    {!! Form::text('debt_comment', null, ['class' => 'form-control']) !!}
                </div>
                @if(isset($client) && $client->image)
                    <div class="mb-3">
                        {!! Form::label('current_image', 'Imagen actual:', ['class' => 'form-label']) !!}
                        <img src="{{ asset('images/' . $client->image) }}" alt="Imagen actual" class="img-thumbnail" style="max-width: 200px;">
                    </div>
                @endif


                <div class="mb-3">
                    {!! Form::label('image', 'Seleccionar una foto (opcional)', ['class' => 'form-label']) !!}
                    {!! Form::file('image', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-12 text-center">
                <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>