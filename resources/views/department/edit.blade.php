{!! Form::model($department, ['route'=> ['departments.update',$department], 'method'=> 'PUT','autocomplete'=>'off']) !!}
    @include('department.department-form')
    <div class="form-group">
        {!! Form::submit('Editar Departamento',['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}