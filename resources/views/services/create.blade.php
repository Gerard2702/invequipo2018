{!! Form::open(['route' => 'services.store', 'method' => 'POST','autocomplete'=>'off']) !!}
    @include('services.services-form')
    <div class="form-group">
        {!! Form::submit('Agregar Servicio',['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
