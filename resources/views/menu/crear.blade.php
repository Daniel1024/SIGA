@extends('layouts.admin')

@section('title', $title)

@section('titulo')
    <h1>{{ $titulo }}</h1>
@stop

@section('content')
    @include('partials.errors')
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{ route('crear_menu') }}" method="post" role="form">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="usuario">Tipo de Usuario</label>
                    <select name="usuario" id="usuario" class="form-control">
                        <option value="admin">Administradores</option>
                        <option value="docente">Docentes</option>
                        <option value="alumno">Alumnos</option>
                        <option value="padres">Padres</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="menu">Tipo de Menú</label>
                    <select name="menu" id="menu" class="form-control">
                        <option value="0">Padre</option>
                        <option value="1">Hijo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="padre">Elija menú Padre</label>
                    <select name="padre" id="padre" class="form-control" disabled>
                        <option value="0">Selecciona...</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="orden">Elija el Orden del menú</label>
                    <select name="orden" id="orden" class="form-control">
                        <option value="0">Selecciona...</option>
                    </select>
                </div>
                <br>
                <div class="form-group form-group-flex">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}">
                    </div>
                    <div class="form-group">
                        <label for="icono">Icono</label>
                        <input type="text" class="form-control" name="icono" id="icono" value="{{ old('icono') }}">
                    </div>
                    <div class="form-group">
                        <label for="url">Escriba el nombre de la ruta</label>
                        <input type="text" class="form-control" name="url" id="url" value="{{ old('url') }}" disabled>
                    </div>
                </div>
                <br>
                <div class="form-group form-group-flex">
                    <input type="submit" class="btn btn-success" name="enviar" value="Guardar" id="enviar">
                    <input type="submit" class="btn btn-primary" name="recargar" value="Cargar menú" id="recargar">
                    <input type="reset" class="btn btn-danger" name="reset" value="Borrar" id="reset">
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function (){
            $('#menu').change(function () {
                var $menu = $(this).val();
                var $padre = $('#padre');
                var $url = $('#url');
                if ($menu == 0) {
                    $padre.prop('disabled', true);
                    $url.prop('disabled', true);
                } else {
                    $padre.prop('disabled', false);
                    $url.prop('disabled', false);
                }
                llenar_orden();
            });
            $('#usuario').change(function (arg) {
                $.get('api/' + arg.target.value, function (response) {
                    var $padre = $('#padre');
                    $padre.find('option').remove().end().append('<option value="0">Selecciona...</option>');
                    response.forEach(function(item,index){
                        if ((item['orden'] == 1) || (item['orden'] == 99) || (item['orden'] == 100)) {
                            return;
                        }
                        $padre.append('<option value="' + item['id'] + '">' + item['nombre'] + '</option>');
                    });
                });
                llenar_orden();
            }).change();
            $('#padre').change(function () {
                llenar_orden();
            });
            function llenar_orden() {
                var usuario = $('#usuario').val();
                var menu    = $('#menu').val();
                var padre   = $('#padre').val();
                //console.log(padre);
                $.get('api/' + usuario + '/' + menu + '/' + padre, function (response) {
                    var orden = $('#orden');
                    orden.find('option').remove().end().append('<option value="0">Selecciona...</option>');
                    //console.log(response);
                    for (var i = 1; i <= 50; i++) {
                        var a = response.indexOf(i);
                        //console.log(a);
                        if (a == -1) {
                            orden.append('<option value="' + i + '">' + i + '</option>');
                        }
                    }
                });
            }
            var usuario_old = "{{ old('usuario') }}";
            var menu_old    = "{{ old('menu') }}";
            var padre_old   = "{{ old('padre') }}";
            if (usuario_old) {
                $('#usuario').val(usuario_old);
            }
            if (menu_old) {
                $('#menu').val(menu_old);
            }
            if (padre_old) {
                $('#padre').val(padre_old);
            }
        });
    </script>
@endsection