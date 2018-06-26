<div class="form-group">
    {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre','required'=>'true']) !!}
</div>
<div class="form-group">
    <div class="form-group">
		{!! Form::label('id_department', 'Centro de Costo',['class'=>'col-md-3 control-label']) !!}
        {!! Form::select('id_department',$departments_options, null, ['class'=>'form-control input-sm miselect','required'=>'true']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Telefono','required'=>'true']) !!}
</div>