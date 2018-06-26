@extends('layouts.masterapp')
@section('title','Equipments Info')
@section('equipments','active')
@section('equipments-ul','nav-sub--open')
@section('content-title','Informacion del Equipo')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h4><strong>Numero Inventario: </strong> {{$equipment[0]->numero_inventario}}</h4>
            <p><strong>Tipo de Equipo: </strong>{{$equipment[0]->tipo_equipo}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"><p><strong>Nivel: </strong>{{$equipment[0]->nivel}}</p></div>
        <div class="col-md-5"><p><strong>Ubicacion: </strong>{{$equipment[0]->ubicacion}}</p></div>
        <div class="col-md-3"><p><strong>Centro Costo: </strong>{{$equipment[0]->centro_costo}}</p></div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Usuario: </strong> {{$equipment[0]->usuario}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"><p><strong>Marca: </strong>{{$equipment[0]->marca}}</p></div>
        <div class="col-md-5"><p><strong>Modelo: </strong>{{$equipment[0]->modelo}}</p></div>
        <div class="col-md-3"><p><strong>Serie: </strong>{{$equipment[0]->serie}}</p></div>
    </div>
    <div class="row">
        <div class="col-md-3"><p><strong>Estado Equipo: </strong>{{$equipment[0]->estado}}</p></div>
        <div class="col-md-5"><p><strong>Fecha Adquisicion: </strong>{{$equipment[0]->fecha_adquisicion}}</p></div>
        <div class="col-md-3"><p><strong>Fecha vencimiento licencia: </strong>{{$equipment[0]->fecha_vencimiento}}</p></div>
    </div>
    <div class="row bg-light">
        <div class="col-md-12">
            <p><strong>Observaciones: </strong>{{$equipment[0]->observaciones}}</p>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-12">
            <h4>Informacion Adicional</h4>
            <h5><strong>Caracteristicas del Procesador</strong> <a href="#" class="btn btn-primary btn-sm" id="btncaracteristicas" data-content="{{$equipment[0]->id}}"><i class="fa fa-plus"></i> Agregar</a></h5>
            <hr>
            <div class="col-md-3"><p><strong>Marca/Modelo: </strong>{{$equipment[0]->marca_modelo}}</p></div>
            <div class="col-md-3"><p><strong>Velocidad: </strong>{{$equipment[0]->velocidad}}</p></div>
            <div class="col-md-2"><p><strong>RAM: </strong>{{$equipment[0]->ram}}</p></div>
            <div class="col-md-2"><p><strong>HDD: </strong>{{$equipment[0]->hdd}}</p></div>
            <div class="col-md-2"><p><strong>CD/DVD: </strong>{{$equipment[0]->cd}}</p></div>
            <h5><strong>Software</strong> <a href="#" class="btn btn-primary btn-sm" id="btnsoftware" data-content="{{$equipment[0]->id}}"><i class="fa fa-plus"></i> Agregar</a></h5>
            <hr>
            <div class="col-md-6"><p><strong>Sistema Operativo: </strong>{{$equipment[0]->sistema_operativo}}</p></div>
            <div class="col-md-6"><p><strong>Licencia S.O: </strong>{{$equipment[0]->licencia_sistema}}</p></div>
            <div class="col-md-6"><p><strong>Version de Office: </strong>{{$equipment[0]->office}}</p></div>
            <div class="col-md-6"><p><strong>Licencia Office: </strong>{{$equipment[0]->licencia_office}}</p></div>
            <div class="col-md-12"><p><strong>Sistemas Institucionales: </strong>{{$equipment[0]->sistemas_institucionales}}</p></div>
            <div class="col-md-12"><p><strong>Otros Softwares (Utilitarios): </strong>{{$equipment[0]->otro_software}}</p></div>
            <h5><strong>Identificacion de RED</strong> <a href="#" class="btn btn-primary btn-sm" id="btnred" data-content="{{$equipment[0]->id}}"><i class="fa fa-plus"></i> Agregar</a></h5>
            <hr>
            <div class="col-md-3"><p><strong>Nombre del Equipo: </strong>{{$equipment[0]->nombre_equipo}}</p></div>
            <div class="col-md-3"><p><strong>Direccion IP: </strong>{{$equipment[0]->direccionip}}</p></div>
            <div class="col-md-3"><p><strong>Nombre Dominio: </strong>{{$equipment[0]->dominio}}</p></div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="mdcaracteristicas" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Caracteristicas</h4>
                </div>
                <div class="modal-body">
                    <div id="contenmd-caracteristicas">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="mdsoftware" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Software</h4>
                </div>
                <div class="modal-body">
                    <div id="contenmd-software">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="mdred" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Identificacion de Red</h4>
                </div>
                <div class="modal-body">
                    <div id="contenmd-red">

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
        @if(session('success'))
            toastr.success('{{session('success')}}',{timeOut: 3000});
        @endif

        $(document).ready(function () {

            $('#btncaracteristicas').click(function () {
                let key = $(this).data('content');
                $.ajax({
                    method: 'GET',
                    url: '/equipment/add/caracteristicas/'+key
                }).done(function (data) {
                    $('#contenmd-caracteristicas').html(data);
                    $('#mdcaracteristicas').modal('show');
                })
            });

            $('#btnred').click(function () {
                let key = $(this).data('content');
                $.ajax({
                    method: 'GET',
                    url: '/equipment/add/red/'+key
                }).done(function (data) {
                    $('#contenmd-red').html(data);
                    $('#mdred').modal('show');
                })
            });

            $('#btnsoftware').click(function () {
                let key = $(this).data('content');
                $.ajax({
                    method: 'GET',
                    url: '/equipment/add/software/'+key
                }).done(function (data) {
                    $('#contenmd-software').html(data);
                    $('#mdsoftware').modal('show');
                })
            });
        });
    </script>
@endsection