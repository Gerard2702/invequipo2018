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
            <div class="table-responsive" id="table-bitacoras">
                <table class="table-hover table-sm table" id="data-table-select">
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
                    <tbody>
                    @foreach($bitacoras as $bitacora)
                        <tr>
                            <td>{{$bitacora->numero_inventario}}</td>
                            <td>{{$bitacora->tipo_equipo}}</td>
                            <td>{{$bitacora->ubicacion}}</td>
                            <td>{{$bitacora->usuario}}</td>
                            <td>{{$bitacora->servicio}}</td>
                            <td>
                                {!! Form::open(['route'=>['bitacora.destroy',$bitacora->id],'method'=>'DELETE','id'=>"frmeliminar$bitacora->id"]) !!}
                                <a href="#" class="btn btn-sm btn-success ver" data-content="{{$bitacora->id}}">Ver o Editar</a>
                                <a href="#" class="btn btn-sm btn-danger eliminar" data-department="{{$bitacora->id}}" data-content="{{$bitacora->numero_inventario}}">Eliminar</a>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Bitacora</h4>
                </div>
                <div class="modal-body">
                    <div id="conten-modal">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
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

            $('#data-table-select').on("click",".ver",function () {
                let key = $(this).data('content');
                $.ajax({
                    method: 'GET',
                    url: '/bitacora/'+key+'/edit'
                }).done(function (data) {
                    $('#conten-modal').html(data);
                    $('#myModal').modal('show');
                });
            });

            $('#data-table-select').on("click",".eliminar",function () {
                let key = $(this).data('department');
                let bitacora = $(this).data('content');
                bootbox.confirm("Desea Eliminar el Departamento "+bitacora+"?", function(result){
                    if(result){
                        $('#frmeliminar'+key).submit();
                    }
                });
            });
        });

        @if(isset($error))
        toastr.error('{{$error}}',{timeOut: 3000});
        @endif
        @if(session('success'))
        toastr.success('{{session('success')}}',{timeOut: 3000});
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

        $('#data-table-select').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraton registros",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros ",
                "infoEmpty": "No se encontraton registros",
                "infoFiltered": "(Filtrado de _MAX_ registros)",
                "paginate": {
                    "first": "Primera",
                    "last": "Ultima",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "search": "Buscar: "
            }
        });
    </script>
@endsection