@extends('layouts.masterapp')
@section('title','Types of Equipment')
@section('equipmentstypes','active')
@section('content-title','Tipos de Equipo')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="#" class="btn btn-primary create">Agregar Tipo de Equipo</a>
            <br><br>
        </div>
    </div>
    <div class="table-responsive">
        <table id="data-table-select" class="table table-sm table-hover" >
            <thead>
            <tr class="thead-light">
                <th class="text-center col-md-5">Nombre</th>
                <th class="text-center col-md-2">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($equipmentstypes as $equipmentype)
                <tr>
                    <td class="text-center">{{$equipmentype->nombre}}</td>
                    <td class="with-btn text-center">
                        {!! Form::open(['route'=>['equipmentstypes.destroy',$equipmentype->id],'method'=>'DELETE','id'=>"frmeliminar$equipmentype->id"]) !!}
                            <a href="#" class="btn btn-sm btn-primary edit" data-equipmentype="{{$equipmentype->id}}">Modificar</a>
                            <a href="#" class="btn btn-sm btn-danger eliminar" data-equipmentype="{{$equipmentype->id}}" data-content="{{$equipmentype->nombre}}">Eliminar</a>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Tipo de Equipo</h4>
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

        $(document).ready(function() {
            $('.create').click(() => {
                $.ajax({
                    url:'equipmentstypes/create'
                }).done(function (data) {
                    $('#conten-modal').html(data);
                    $('#myModal').modal('show');
                });
            });

            $("#data-table-select").on("click", ".edit", function(){
                let key = $(this).data('equipmentype');
                $.ajax({
                    method: 'GET',
                    url: 'equipmentstypes/'+key+'/edit'
                }).done(function (data) {
                    $('#conten-modal').html(data);
                    $('#myModal').modal('show');
                });
            });

            $('#data-table-select').on("click",".eliminar",function () {
                let key = $(this).data('equipmentype');
                let nombre = $(this).data('content');
                bootbox.confirm("Desea Eliminar el tipo de equipo "+nombre+"?", function(result){
                    if(result){
                        $('#frmeliminar'+key).submit();
                    }
                });
            });
        });
        @if(session('success'))
            toastr.success('{{session('success')}}',{timeOut: 3000});
        @elseif(session('error'))
            toastr.error('{{session('error')}}',{timeOut: 3000});
        @endif
    </script>
@endsection

