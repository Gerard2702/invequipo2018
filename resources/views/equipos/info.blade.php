@extends('layouts.masterapp')
@section('title','Equipments Info')
@section('equipments','active')
@section('equipments-ul','nav-sub--open')
@section('content-title','Info Equipo')
@section('content')

@endsection
@section('scripts')
    <script>

        @if(session('success'))
            $.notify("{{session('success')}}", "success",{ position: 'bottom right',click: true});
        @endif
    </script>
@endsection