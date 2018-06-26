{!! Form::open(['route' => 'users.store', 'method' => 'POST','autocomplete'=>'off']) !!}
    @include('users.users-form')
    <div class="form-group">
        {!! Form::submit('Agregar Usuario',['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
