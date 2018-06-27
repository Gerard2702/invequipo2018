@extends('layouts.masterapp')
@section('title','Equipments')
@section('equipments','active')
@section('equipments-ul','nav-sub--open')
@section('content-title','Agregar Equipo')
@section('content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::model($equipment,['route' => ['equipments.update',$equipment], 'method' => 'PUT','class'=>'form-horizontal']) !!}
            <div class="form-group">
                {!! Form::label('tipo_equipo', 'Tipo de Equipo',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::select('id_tipo_equipo',$tipo_equipo_options, null, ['class'=>'form-control input-sm miselect','required'=>'true']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('centro_costo', 'Centro de Costo',['class'=>'col-md-3 control-label']) !!}
                <dic class="col-md-9">
                    {!! Form::select('id_centro_costo',$departments_options, null, ['class'=>'form-control input-sm miselect','required'=>'true']) !!}
                </dic>
            </div>
            <div class="form-group">
                {!! Form::label('nivel', 'Nivel',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::select('id_nivel',$nivels_options, null, ['class'=>'form-control input-sm miselect','required'=>'true']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('ubicacion', 'Ubicación',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::text('ubicacion',null,['class'=>'form-control input-sm','placeholder'=>'Ubicacion','required'=>'true']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('usuario', 'Usuario',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::select('id_usuario',$usuarios_options, null, ['class'=>'form-control input-sm miselect','required'=>'true']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('inventario', 'Numero de inventario',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::text('numero_inventario',null,['class'=>'form-control input-sm','placeholder'=>'Numero de inventario','required'=>'true']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('marca', 'Marca',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-3">
                    {!! Form::text('id_marca',null,['class'=>'form-control input-sm','placeholder'=>'Marca','required'=>'true']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::text('modelo',null,['class'=>'form-control input-sm','placeholder'=>'Modelo','required'=>'true']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::text('serie',null,['class'=>'form-control input-sm','placeholder'=>'Serie','required'=>'true']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('id_estado_equipo', 'Estado Equipo',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::select('id_estado_equipo',$estados_options, null, ['class'=>'form-control input-sm miselect','required'=>'true']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('fecha_adquisicion', 'Fecha adquisicion',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!!Form::text('fecha_adquisicion', null,['class'=>'form-control input-sm fecha','required'=>'true']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('fecha_vencimiento', 'Fecha vencimiento',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!!Form::text('fecha_vencimiento',null,['class'=>'form-control input-sm fecha','required'=>'true']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('observaciones', 'Observaciones',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::textarea('observaciones', null, ['class' => 'form-control','size' => '30x4']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    {!! Form::submit('Agregar Equipo',['class'=>'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.miselect').select2({
            placeholder: "",
            allowClear: true
        });

        $('.fecha').datepicker({
            todayBtn: "linked",
            format: 'yyyy-mm-dd',
            clearBtn: true,
            language: "es",
            autoclose: true,
            todayHighlight: true,
            disableTouchKeyboard: true,
        });
    </script>
@endsection