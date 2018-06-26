<div class="form-group">
    <label>Nombre del Equipo</label>
    {!! Form::text('nombre_equipo',null,['class'=>'form-control input-sm','placeholder'=>'Nombre del Equipo']) !!}
</div>
<div class="form-group">
    <label>Direccion IP</label>
    {!! Form::select('id_direccionip',$direccion_options, null, ['class'=>'form-control input-sm']) !!}
</div>
<div class="form-group">
    <label>Dominio</label>
    {!! Form::select('id_dominio',$domain_options, null, ['class'=>'form-control input-sm']) !!}
</div>