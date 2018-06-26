{!! Form::model($marca, ['route'=> ['marca.update',$marca], 'method'=> 'PUT','autocomplete'=>'off']) !!}
    @include('marca.marca-form')
    <div class="form-group">
        {!! Form::submit('Editar Marca',['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}