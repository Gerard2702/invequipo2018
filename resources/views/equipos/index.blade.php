@extends('layouts.masterapp')
@section('title','Equipments Info')
@section('equipments','active')
@section('equipments-ul','nav-sub--open')
@section('content-title','Equipos')
@section('content')
    <div class="table-responsive">
        <table class="table table-hover table-sm" id="data-table-select">
            <thead>
                <tr>
                    <th># Inventario</th>
                    <th>Tipo Equipo</th>
                    <th>Ubicacion</th>
                    <th>Centro Costo</th>
                    <th>Usuario</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($equipments as $equipment)
                <tr>
                    <td>{{$equipment->numero_inventario}}</td>
                    <td>{{$equipment->tipo_equipo}}</td>
                    <td>{{$equipment->ubicacion}}</td>
                    <td>{{$equipment->centro_costo}}</td>
                    <td>{{$equipment->usuario}}</td>
                    <td class="with-btn text-center">
                        {!! Form::open(['route'=>['equipments.destroy',$equipment->id],'method'=>'DELETE']) !!}
                        <a href="{{route('equipments.show',$equipment->id)}}" class="btn btn-sm btn-primary">Ver</a>
                        {!! Form::submit('Eliminar',['class'=>'btn btn-sm btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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

    </script>
@endsection