<!doctype html>
<html lang="es">
<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <title>Iniciar sesión</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
   <!--Cargar fuentes de google-->
   <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
   <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
   <!--Cargar iconos awesome-->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
   <!--Cargar el ccs propio-->
   <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
</head>

<body>
    <div id="login">
        @include('partials.errors')
        <form action="{{ route('login') }}" target="_top" method="POST">
            {!! csrf_field() !!}
            <fieldset class="clearfix">
                <p><span class="fa fa-user" aria-hidden="true"></span>
                  <input type="text" id="usuario" name="usuario" placeholder="Usuario" value="{{ old('usuario') }}" >
               </p> <!-- JS because of IE support; better: placeholder="Username" -->
                <p><span class="fa fa-lock" aria-hidden="true"></span>
                  <input type="password" id="clave" name="clave" placeholder="Clave" >
               </p> <!-- JS because of IE support; better: placeholder="Password" -->
                <p><input type="submit" value="Ingresar"></p>
            </fieldset>
        </form>
        <span id="msj"></span>
        <p>Ha olvidado su contraseña? <a target="_parent" href="{{ route('login') }}">Recuperar</a><span class="fa fa-arrow-right" aria-hidden="true"></span></p>
    </div> <!-- end login -->
    <!--Cargando el jQuery-->
   <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
   <script>
      $(document).ready(function (){
         $( "#usuario" ).focus();
      });
   </script>
</body>
</html>