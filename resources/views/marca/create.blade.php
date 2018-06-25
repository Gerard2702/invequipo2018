{!! Form::open(['route' => 'marcas.store', 'method' => 'POST','autocomplete'=>'off']) !!}
    @include('marca.marca-form')
    <div class="form-group">
        {!! Form::submit('Agregar Marca',['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
