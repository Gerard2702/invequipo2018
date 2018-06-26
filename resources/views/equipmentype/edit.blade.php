{!! Form::model($equipmentype, ['route'=> ['equipmentstypes.update',$equipmentype], 'method'=> 'PUT','autocomplete'=>'off']) !!}
    @include('equipmentype.equipmentype-form')
    <div class="form-group">
        {!! Form::submit('Editar Tipo de Equipo',['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}