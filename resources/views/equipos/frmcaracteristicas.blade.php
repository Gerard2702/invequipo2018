<div class="form-group">
    <label>Marca/Modelo</label>
    {!! Form::text('marca_modelo',null,['class'=>'form-control input-sm','placeholder'=>'Marca/Modelo']) !!}
</div>
<div class="form-group">
    <label>Velocidad</label>
    {!! Form::text('velocidad',null,['class'=>'form-control input-sm','placeholder'=>'Velocidad']) !!}
</div>
<div class="form-group">
    <label>RAM</label>
    {!! Form::text('ram',null,['class'=>'form-control input-sm','placeholder'=>'RAM']) !!}
</div>
<div class="form-group">
    <label>HDD</label>
    {!! Form::text('hdd',null,['class'=>'form-control input-sm','placeholder'=>'HDD']) !!}
</div>
<div class="form-group">
    <label for="cd-dvd">CD/DVD</label>
    {!! Form::select('id_cd',$cd_options, null, ['class'=>'form-control input-sm']) !!}
</div>