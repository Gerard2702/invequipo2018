<div class="form-group">
    <label>Nombre del Equipo</label>
    {!! Form::text('nombre-equipo',null,['class'=>'form-control input-sm','placeholder'=>'Nombre del Equipo','required'=>'true']) !!}
</div>
<div class="form-group">
    <label>Direccion IP</label>
    {!! Form::select('direccionip',$direccion_options, null, ['class'=>'form-control input-sm','required'=>'true']) !!}
</div>
<div class="form-group">
    <label>Dominio</label>
    {!! Form::select('dominio',$dominio, null, ['class'=>'form-control input-sm','required'=>'true']) !!}
</div>