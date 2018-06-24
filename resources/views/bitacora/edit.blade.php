<div class="col-md-12">
    <div class="row ">
        <div class="col-md-6">
            <h4><strong>Numero Inventario: </strong> {{$equipment[0]->numero_inventario}}</h4>
            <p><strong>Tipo de Equipo: </strong>{{$equipment[0]->tipo_equipo}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"><p><strong>Nivel: </strong>{{$equipment[0]->nivel}}</p></div>
        <div class="col-md-5"><p><strong>Ubicacion: </strong>{{$equipment[0]->ubicacion}}</p></div>
        <div class="col-md-3"><p><strong>Centro Costo: </strong>{{$equipment[0]->centro_costo}}</p></div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Usuario: </strong> {{$equipment[0]->usuario}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"><p><strong>Marca: </strong>{{$equipment[0]->marca}}</p></div>
        <div class="col-md-5"><p><strong>Modelo: </strong>{{$equipment[0]->modelo}}</p></div>
        <div class="col-md-3"><p><strong>Serie: </strong>{{$equipment[0]->serie}}</p></div>
    </div>
</div>
{!! Form::model($bitacora,['route'=>['bitacora.update',$bitacora],'method'=>'PUT']) !!}
<div class="form-group">
    {!! Form::label('tipo_servicio', 'Tipo Servicio') !!}
    {!! Form::select('id_tipo_servicio',$servicios_options, null, ['class'=>'form-control input-sm servicios_select','required'=>'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('fecha','Fecha') !!}
    {!! Form::text('fecha',null,['class'=>'form-control fecha input-sm','required'=>'true','placeholder'=>'Seleccione una fecha','data-date-end-date'=>'0d','disabled'=>'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('descripcion','Descripcion de falla') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control','size' => '30x4','required'=>'true']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Editar Bitacora',['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
