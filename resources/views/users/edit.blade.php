{!! Form::model($user, ['route'=> ['users.update',$user], 'method'=> 'PUT','autocomplete'=>'off']) !!}
    @include('users.users-form')
    <div class="form-group">
        {!! Form::submit('Editar Usuario',['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}