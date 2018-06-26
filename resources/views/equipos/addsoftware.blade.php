<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {!! Form::model($equipment,['route'=>['software-store',$equipment->id],'method'=>'POST']) !!}
        @include('equipos.frmsoftware')
        <div class="form-group">
            {!! Form::submit('Agregar Software',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>