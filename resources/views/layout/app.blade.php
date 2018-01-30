<!DOCTYPE html>
<html>
<head>
  <title>App name-@yield('titulo')</title>
</head>
  <body>
    @section('menu')
      Menu Master.
    @show
    <div class='container'>
      @yield('contenido')
    </div>
  </body>
</html>
