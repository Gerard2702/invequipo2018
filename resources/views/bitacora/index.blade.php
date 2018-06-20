@extends('layouts.masterapp')
@section('title','Bitacoras')
@section('bitacora','active')
@section('bitacora-ul','nav-sub--open')
@section('content-title','Bitacoras')
@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="form-group">
                {!! Form::date('fecha', \Carbon\Carbon::now(),['class'=>'form-control input-sm','required'=>'true','id'=>'fecha']) !!}
            </div>
            <div class="form-group">
                <a href="#" class="btn btn-sm btn-primary" id="cargar">Cargar Soportes</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
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
            $('#cargar').click(function (e) {
                e.preventDefault();
                var fecha = $('#fecha').val();
                $.ajax({
                    method: 'GET',
                    url: '/bitacora/bitacoras/'+fecha
                }).done(function (data) {
                    $('#table-bitacoras').html(data);
                });
            });
        })
    </script>
@endsection