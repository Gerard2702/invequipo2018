{!! Form::open(['route' => 'departments.store', 'method' => 'POST','autocomplete'=>'off']) !!}
    @include('department.department-form')
    <div class="form-group">
        {!! Form::submit('Agregar Departamento',['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
