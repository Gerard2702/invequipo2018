@extends('layouts.masterapp')
@section('title','Equipments')
@section('equipments','active')
@section('equipments-ul','nav-sub--open')
@section('content-title','Agregar Equipo')
@section('content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['route' => 'equipments.store', 'method' => 'POST','class'=>'form-horizontal']) !!}
            <div class="form-group">
                {!! Form::label('tipo_equipo', 'Tipo de Equipo',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::select('tipo_equipo',$tipo_equipo_options, null, ['class'=>'form-control input-sm miselect']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('centro_costo', 'Centro de Costo',['class'=>'col-md-3 control-label']) !!}
                <dic class="col-md-9">
                    {!! Form::select('centro_costo',$departments_options, null, ['class'=>'form-control input-sm miselect']) !!}
                </dic>
            </div>
            <div class="form-group">
                {!! Form::label('nivel', 'Nivel',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::select('nivel',$nivels_options, null, ['class'=>'form-control input-sm miselect']) !!}
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
                    {!! Form::select('usuario',$usuarios_options, null, ['class'=>'form-control input-sm miselect']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('inventario', 'Numero de inventario',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::text('inventario',null,['class'=>'form-control input-sm','placeholder'=>'Numero de inventario','required'=>'true']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('marca', 'Marca',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-3">
                    {!! Form::select('marca',$marcas_options, null, ['class'=>'form-control input-sm miselect']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::text('modelo',null,['class'=>'form-control input-sm','placeholder'=>'Modelo','required'=>'true']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::text('serie',null,['class'=>'form-control input-sm','placeholder'=>'Serie','required'=>'true']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('estado', 'Estado Equipo',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::select('estado',$estados_options, null, ['class'=>'form-control input-sm miselect']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('fecha_adquisicion', 'Fecha adquisicion',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!!Form::date('fecha_adquisicion', \Carbon\Carbon::now(),['class'=>'form-control input-sm']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('fecha_vencimiento', 'Fecha vencimiento',['class'=>'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!!Form::date('fecha_vencimiento', \Carbon\Carbon::now(),['class'=>'form-control input-sm']) !!}
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
    </script>
@endsection