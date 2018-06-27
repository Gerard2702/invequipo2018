<div class="form-group">
    <label>Sistema Operatico</label>
    {!! Form::text('sistema_operativo',null,['class'=>'form-control input-sm','placeholder'=>'Sistema Operativo']) !!}
</div>
<div class="form-group">
    <label>Licencia Sistema</label>
    {!! Form::text('licencia_sistema',null,['class'=>'form-control input-sm','placeholder'=>'Licencia Sistema']) !!}
</div>
<div class="form-group">
    <label>Office</label>
    {!! Form::text('office',null,['class'=>'form-control input-sm','placeholder'=>'Office']) !!}
</div>
<div class="form-group">
    <label>Licencia Office</label>
    {!! Form::text('licencia_office',null,['class'=>'form-control input-sm','placeholder'=>'Licencia Office']) !!}
</div>
<div class="form-group">
    <label>Sistemas Institucionales</label>
    {!! Form::textarea('sistemas_institucionales', null, ['class' => 'form-control','size' => '30x4','placeholder'=>'Sistemas Institucionales']) !!}
</div>
<div class="form-group">
    <label>Otro Software</label>
    {!! Form::textarea('otro_software', null, ['class' => 'form-control','size' => '30x4','placeholder'=>'Otro Software']) !!}
</div>