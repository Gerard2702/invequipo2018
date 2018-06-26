<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {!! Form::open(['route'=>['red-store',$equipment[0]],'method'=>'POST']) !!}
        @include('equipos.frmred',array('direccion_options'=>$direccion_options,'dominio_options'=>$dominio_options))
        <div class="form-group">
            {!! Form::submit('Agregar Identificacion de RED',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>