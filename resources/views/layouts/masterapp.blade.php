<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INVEQUIPO - @yield('title')</title>
    @include('layouts.header')
</head>
<body>
<div class="loader"></div>
<div id="ui" class="ui">
    <header id="header" class="ui-header ui-header--blue text-white">
        <div class="navbar-header">
            <a href="{{route('home')}}" class="navbar-brand">
                <p>INVENTARIO ISSS</p>
            </a>
        </div>
        <div class="navbar-collapse nav-responsive-disabled">
            <ul class="nav navbar-nav">
                <li>
                    <a class="toggle-btn" data-toggle="ui-nav" href="">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-usermenu">
                    <a href="#" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <div class="user-avatar"><img src="/img/edit-user.png" alt="usuario img"></div>
                        <span class="hidden-sm hidden-xs">{{ Auth::user()->name }}</span>
                        <span class="caret hidden-sm hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesion') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    @include('layouts.sidebar')
    <div id="content" class="ui-content ui-content-aside-overlay">
        <div class="ui-content-body">
            <div class="ui-container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="panel">
                            <div class="panel-body">
                                <div id="titulo">
                                    <h4>@yield('content-title')</h4>
                                </div>
                                <div id="contenido">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.scripts')
    @yield('scripts')
</div>
</body>