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