@extends('layouts.masterapp')
@section('title','Equipments Info')
@section('equipments','active')
@section('equipments-ul','nav-sub--open')
@section('content-title','Equipos')
@section('content')
    <div class="table-responsive">
        <table class="table table-hover table-sm">
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
                    <td>{{$equipment->id_tipo_equipo}}</td>
                    <td>{{$equipment->ubicacion}}</td>
                    <td>{{$equipment->id_centro_costo}}</td>
                    <td>{{$equipment->id_usuario}}</td>
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

    </script>
@endsection