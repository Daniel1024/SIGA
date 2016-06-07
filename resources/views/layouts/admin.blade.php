<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">
    <!--Cargar fuentes de google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <!--Cargar iconos awesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!--Cargar el ccs de fancyBox
    <link rel="stylesheet" href="assets/fancybox/jquery.fancybox.css">-->
    <!--Cargar el ccs propio-->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @yield('css')
    <title>@yield('title')</title>
</head>
<body>
    <!--head-bar-->
    <header class="head-bar">
        <a href="{{ route('home') }}">
            <img src="{{ asset('img/logo-4.png') }}" alt="logo">
        </a>
        <h2>{{ auth()->user()->first_name. " ".auth()->user()->last_name }}</h2>
        <button id="btn-menu" class="fa fa-bars"></button>
    </header>
    <!--head-bar-->
    <!--*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-->
    <!--sidebar-->
    <nav class="sidebar">
        <!--Logo-->
        <ul>
            <li class="img-logo-nav">
                <img src="{{ asset('img/surcos/logo_1.jpg') }}" alt="logo">
            </li>
        </ul>
        <!--Menu-->
        <ul>
            <li><a href="{{ url('home/menu') }}"><i class="fa fa-envelope"></i>MENÚ PRINCIPAL</a></li>
            <li class="parent"><a href="{{ url('notificacion/menu') }}"><i class="fa fa-bell"></i>Menú de Notificaciones</a>
                <ul>
                    <li><a href="{{ url('notificacion/comunicado') }}"><i class="fa fa-chevron-circle-right"></i>Comunicados</a></li>
                    <li><a href="{{ url('notificacion/cartelera') }}"><i class="fa fa-chevron-circle-right"></i>Cartelera</a></li>
                    <li><a href="{{ url('notificacion/calendario') }}"><i class="fa fa-chevron-circle-right"></i>Calendario</a></li>
                </ul>
            </li>
            <li class="parent"><a href="{{ url('usuario/menu') }}"><i class="fa fa-user"></i>Menú de Usuario</a>
                <ul>
                    <li><a href="{{ url('usuario/aula') }}"><i class="fa fa-chevron-circle-right"></i>Aulas Asignadas</a></li>
                    <li><a href="{{ url('usuario/agenda') }}"><i class="fa fa-chevron-circle-right"></i>Agenda Escolar</a></li>
                    <li><a href="{{ url('usuario/comportamiento') }}"><i class="fa fa-chevron-circle-right"></i>Comportamiento</a></li>
                </ul>
            </li>
            <li class="parent"><a href="{{ url('docente/menu') }}"><i class="fa fa-briefcase"></i>Portafolio Docente</a>
                <ul>
                    <li><a href="{{ url('docente/registro') }}"><i class="fa fa-chevron-circle-right"></i>Registro</a></li>
                    <li><a href="{{ url('docente/reporte') }}"><i class="fa fa-chevron-circle-right"></i>Reporte</a></li>
                    <li><a href="{{ url('docente/estandares') }}"><i class="fa fa-chevron-circle-right"></i>Estandares</a></li>
                </ul>
            </li>
            <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out"></i>Cerrar Sessión</a></li>
        </ul>
    </nav>
    <!--*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-->
    <!--main-->
    <section class="main">
        <div class="titulo">
            @yield('titulo')
        </div>
        @yield('content')
    </section>
    <!--main-->
    <!--*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-->
    <!--Cargando el js propio-->
    <script src="{{ asset('js/admin.js') }}"></script>
    @yield('js')
</body>
</html>