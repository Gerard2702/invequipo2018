<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {!! Form::model($equipment,['route'=>['red-store',$equipment],'method'=>'POST']) !!}
        @include('equipos.frmred',array('direccion_options'=>$direccion_option,'domain_options'=>$domain_option))
        <div class="form-group">
            {!! Form::submit('Agregar Identificacion de RED',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>