@extends('layouts.masterapp')
@section('title','Crear Bitacora')
@section('bitacora','active')
@section('bitacora-ul','nav-sub--open')
@section('content-title','Crear Nueva Bitacora')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('numero_inventario', 'Numero Inventario',['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-4">
                {!! Form::select('numero_inventario',$inventarios_options, null, ['class'=>'form-control input-sm inventario_select','id'=>'numero_inventario']) !!}
            </div>
            <div class="col-md-1">
                <a href="#" class="btn btn-primary" id="cargar">Cargar</a>
            </div>
        </div>
        <div id="bitacora-content">

        </div>

    </div>
</div>
@endsection
@section('scripts')
    <script>
        $('.inventario_select').select2({ placeholder: "Seleccione un inventario", allowClear: true});
        $(document).ready(function () {
           $('#cargar').click(function (e) {
               e.preventDefault();
               var num = $('#numero_inventario').val();
               $.ajax({
                   method: 'GET',
                   url: '/bitacora/cargar/'+num+''
               }).done(function (data) {
                   $('#bitacora-content').html(data);
               });
           })
        });
        @if(session('success'))
        toastr.success('{{session('success')}}',{timeOut: 3000});
        @endif
    </script>
@endsection