<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {!! Form::model($equipment,['route'=>['equipment-store',$equipment->id],'method'=>'POST']) !!}
        @include('equipos.frmcaracteristicas',array('cd_options'=>$cd_options))
        <div class="form-group">
            {!! Form::submit('Agregar Caracteristicas',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>

