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
@if(count($bitacoras)!=0)
    <div>
        <a href="{{route('bitacora-generate',$bitacoras[0]->fecha)}}" class="btn btn-warning">Generar Reporte</a>
    </div>
@endif
<script>
    @if(isset($error))
    toastr.error('{{$error}}',{timeOut: 3000});
    @endif
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
    $(document).ready(function () {
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
</script>