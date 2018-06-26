{!! Form::open(['route' => 'equipmentstypes.store', 'method' => 'POST','autocomplete'=>'off']) !!}
    @include('equipmentype.equipmentype-form')
    <div class="form-group">
        {!! Form::submit('Agregar Tipo de Equipo',['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
