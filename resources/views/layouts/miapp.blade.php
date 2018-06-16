<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>INVEQUIPO - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    @include('layouts.header')
</head>
<body>
<div id="page-loader" class="fade show"><span class="spinner"></span></div>

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <div id="header" class="header navbar-default">
        <div class="navbar-header">
            <a href="/home" class="navbar-brand"><span class="navbar-logo"><i class="ion-ios-cloud"></i></span><strong>INVENTARIO ISSS</strong></a>
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <ul class="navbar-nav navbar-right">
            <li class="dropdown navbar-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="/img/user.png" alt="usuario" />
                    <span class="d-none d-md-inline"><b class="caret"></b>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Cerrar Sesion') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>

    @include('layouts.sidebar')

    <div id="content" class="content">
        <h1 class="page-header">@yield('content-title')</h1>
        <div class="row">
            @yield('content')
        </div>
    </div>

    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
</div>
@include('layouts.scripts')
@yield('scripts')

</body>
</html>

