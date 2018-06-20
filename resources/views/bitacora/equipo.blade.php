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
<div class="col-md-6">
{!! Form::open(['route'=>'bitacora.store','method'=>'POST']) !!}
    <div class="form-group">
        {!! Form::label('tipo_servicio', 'Tipo Servicio') !!}
        {!! Form::select('tipo_servicio',$servicios_options, null, ['class'=>'form-control input-sm servicios_select','required'=>'true']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fecha','Fecha') !!}
        {!! Form::date('fecha', \Carbon\Carbon::now(),['class'=>'form-control input-sm','required'=>'true']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('descripcion','Descripcion de falla') !!}
        {!! Form::textarea('descripcion', null, ['class' => 'form-control','size' => '30x4','required'=>'true']) !!}
        {!! Form::hidden('equipo', $equipment[0]->id) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Agregar Bitacora',['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
</div>
<script>
    $('.servicios_select').select2({ placeholder: "Seleccione un tipo de servicio", allowClear: true});
</script>