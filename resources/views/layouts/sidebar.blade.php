<aside id="aside" class="ui-aside ui-aside--dark">
    <ul class="nav" ui-nav id="mimenu">
        <li id="inicio"><a href="{{route('home')}}"><i class="fa fa-home"></i><span> INICIO </span></a></li>
        <li id="crearsolicitud"><a href="{{route('equipments.index')}}"><i class="fa fa-file-text-o"></i><span>Inventario</span></a></li>
        <li class="@yield('bitacora')">
            <a href=""><i class="fa fa-wrench"></i><span>Bitacora</span><i class="fa fa-angle-right pull-right"></i></a>
            <ul class="nav nav-sub @yield('bitacora-ul')">
                <li><a href="{{route('bitacora.create')}}"><span>Agregar</span></a></li>
                <li><a href="{{route('bitacora.index')}}"><span>Ver Bitacoras</span></a></li>
            </ul>
        </li>
        <li class="@yield('equipments')">
            <a href=""><i class="fa fa-user"></i><span>Equipos</span><i class="fa fa-angle-right pull-right"></i></a>
            <ul class="nav nav-sub @yield('equipments-ul')">
                <li><a href="{{route('equipments.create')}}"><span>Agregar Equipo</span></a></li>
                <li><a href="{{route('equipments.index')}}"><span>Ver Equipos</span></a></li>
            </ul>
        </li>
        <li class="@yield('departments')"><a href="{{route('departments.index')}}"><i class="fa fa-building-o"></i><span>Departamentos</span></a>
        <li class="@yield('services-types')"><a href="{{route('services.index')}}"><i class="fa fa-info-circle"></i><span>Tipos de Servicio</span></a></li>
        <li class="@yield('equipments-types')"><a href="{{route('equipmentstypes.index')}}"><i class="fa fa-desktop"></i><span>Tipos de Equipo</span></a></li>
        <li class="@yield('users')"><a href="{{route('users.index')}}"><i class="fa fa-user"></i><span>Usuarios</span></a></li>
        <li class="@yield('admins')"><a href="{{route('admins.index')}}"><i class="fa fa-user-plus"></i><span>Administradores</span></a></li>
        <li class="@yield('others')">
            <a href=""><i class="fa fa-user"></i><span>Otros Mantenimientos</span><i class="fa fa-angle-right pull-right"></i></a>
            <ul class="nav nav-sub @yield('others-ul')">
                <li><a href="{{route('marcas.index')}}"><span>Marcas</span></a></li>
                <li><a href="{{route('perifericos.index')}}"><span>CD/DVD</span></a></li>
                <li><a href="{{route('direccionip.index')}}"><span>Direccion IP</span></a></li>
                <li><a href="{{route('domains.index')}}"><span>Nombres de Dominio</span></a></li>
                <li><a href="{{route('estates.index')}}"><span>Estado del Equipo</span></a></li>
            </ul>
        </li>
    </ul>
</aside>