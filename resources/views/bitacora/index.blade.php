@extends('layouts.masterapp')
@section('title','Bitacoras')
@section('bitacora','active')
@section('bitacora-ul','nav-sub--open')
@section('content-title','Bitacoras')
@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="form-group">
                {!! Form::text('fecha', null,['class'=>'form-control fecha input-sm','required'=>'true','id'=>'fecha','placeholder'=>'Seleccione una fecha','data-date-end-date'=>'0d']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4>Reporte Bitacoras de la fecha : <strong id="txtfecha">{{$fecha}}</strong></h4>
            <div class="table-responsive">
                <table class="table-hover table-sm table">
                    <thead>
                    <tr>
                        <th>Num. Inventario</th>
                        <th>Tipo Equipo</th>
                        <th>Ubicacion</th>
                        <th>Responsable del Equipo</th>
                        <th>Tipo de Servicio</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody id="table-bitacoras">
                    @foreach($bitacoras as $bitacora)
                        <tr>
                            <td>{{$bitacora->numero_inventario}}</td>
                            <td>{{$bitacora->tipo_equipo}}</td>
                            <td>{{$bitacora->ubicacion}}</td>
                            <td>{{$bitacora->usuario}}</td>
                            <td>{{$bitacora->servicio}}</td>
                            <td>
                                {!! Form::open(['route'=>['departments.destroy',$bitacora->id],'method'=>'DELETE']) !!}
                                <a href="#" class="btn btn-sm btn-primary edit" data-department="{{$bitacora->id}}">Modificar</a>
                                {!! Form::submit('Eliminar',['class'=>'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#fecha').change(function (e) {
                e.preventDefault();
                var fecha = $('#fecha').val();
                $.ajax({
                    method: 'GET',
                    url: '/bitacora/bitacoras/'+fecha
                }).done(function (data) {
                    $('#table-bitacoras').html(data);
                    $('#txtfecha').html(fecha);
                });
            });
        });

        @if(isset($error))
        toastr.error('{{$error}}',{timeOut: 3000});
        @endif

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