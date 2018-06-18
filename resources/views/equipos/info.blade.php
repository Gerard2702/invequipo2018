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
            toastr.success('{{session('success')}}',{timeOut: 3000});
        @endif
    </script>
@endsection