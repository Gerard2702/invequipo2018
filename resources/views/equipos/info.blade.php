@extends('layouts.masterapp')
@section('title','Equipments Info')
@section('equipments','active')
@section('equipments-ul','nav-sub--open')
@section('content-title','Informacion del Equipo')
@section('content')
<div class="col-md-6">
    <p><strong>Numero Inventario: </strong> {{$equipment->numero_inventario}}</p>
    <p><strong>Tipo de Equipo: </strong> {{$equipment->id_tipo_equipo}}</p>
</div>
@endsection
@section('scripts')
    <script>
        @if(session('success'))
            toastr.success('{{session('success')}}',{timeOut: 3000});
        @endif
    </script>
@endsection