@extends('layouts.masterapp')
@section('title','Departments')
@section('departments','active')
@section('content-title','Departamentos')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="#" class="btn btn-primary create">Agregar Departamento</a>
            <br><br>
        </div>
    </div>
    <div class="table-responsive">
        <table id="data-table-select" class="table table-sm table-hover" >
            <thead>
            <tr class="thead-light">
                <th class="text-center col-md-5">Centro de Costo</th>
                <th class="text-center col-md-4">Ubicacion</th>
                <th class="text-center col-md-3">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($departments as $department)
                <tr>
                    <td class="text-center">{{$department->centro_costo}}</td>
                    <td class="text-center">{{$department->ubicacion}}</td>
                    <td class="with-btn text-center">
                        {!! Form::open(['route'=>['departments.destroy',$department->id],'method'=>'DELETE']) !!}
                            <a href="#" class="btn btn-sm btn-primary edit" data-department="{{$department->id}}">Modificar</a>
                            {!! Form::submit('Eliminar',['class'=>'btn btn-sm btn-danger']) !!}
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
                    <h4 class="modal-title">Departamento</h4>
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

        });

        $(document).ready(function() {
            $('.create').click(() => {
                $.ajax({
                    url:'departments/create'
                }).done(function (data) {
                    $('#conten-modal').html(data);
                    $('#myModal').modal('show');
                });
            });

            $('.edit').click( function() {
                let key = $(this).data('department');
                $.ajax({
                    method: 'GET',
                    url: 'departments/'+key+'/edit'
                }).done(function (data) {
                    $('#conten-modal').html(data);
                    $('#myModal').modal('show');
                });
            });
        });
        @if(session('success'))
        $.notify("{{session('success')}}", "success",{ position: 'bottom right',click: true});
        @elseif(session('error'))
        $.notify("{{session('error')}}", "error",{ position: 'bottom right',click: true});
        @endif
    </script>
@endsection

