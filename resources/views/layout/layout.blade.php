<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>COLEGIO INMACULADA CONCEPCION</title>

    <!--Bootstrap Core CSS -->
    <link href={{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}
            rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href={{ URL::asset('bower_components/metisMenu/dist/metisMenu.min.css') }}
            rel="stylesheet">

@yield('estilos')

<!-- Custom CSS -->
    <link href={{ URL::asset('dist/css/sb-admin-2.css') }} rel="stylesheet">

    <!-- Custom Fonts -->
    <link href={{ URL::asset('bower_components/font-awesome/css/font-awesome.min.css')
    }} rel="stylesheet" type="text/css">
</head>

<boby>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation"
             style="margin-bottom: 0;background-color: darkblue">
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><p class="text-primary" style="color: white">CONTROL DEL COLEGIO INMACULADA CONCEPCION</p></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="mailto:tudireccion@email.com">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa
                    fa-caret-down"></i>
                    </a>

                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        {{--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Cambiar--}}
                                {{--Contraseña</a>--}}
                        {{--</li>--}}
                        {{--<li class="divider"></li>--}}
                        <li>
                            {{--<a href="login.html"><i class="fa fa-sign-out fa-fw"></i>--}}
                                {{--Logout</a>--}}
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                Cerrar Sesion
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    <!--/.dropdown-user -->
                </li>
                <!--/.dropdown -->
            </ul>
            <!--/.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control"
                                       placeholder="Buscar...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="/"><i class="fa fa-book fa-fw"></i>
                                Coming Soon</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>
                                MANTENIMIENTOS<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/alumnos">Alumnos</a>
                                </li>
                                <li>
                                    <a href="/docentes">Docentes</a>
                                </li>
                                <li>
                                    <a href="/apoderados">Apoderados</a>
                                </li>
                                <li>
                                    <a href="/aulas">Aulas</a>
                                </li>
                                <li>
                                    <a href="/cursos">Cursos</a>
                                <li>
                                    <a href="/notas">Notas</a>
                                </li>
                                <li>
                                    <a href="/anios">Años</a>
                                </li>
                                <li>
                                    <a href="/matriculas">Matriculas</a>
                                </li>
                                <li>
                                    <a href="/listamatriculas">Lista De Matriculas</a>
                                </li>
                                <li> <a href="/viewalumnos">ViewAlumnos</a></li>


                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!--/.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Page Content -->
        <div id="page-wrapper">
            @yield('content')
        </div>
        <!-- /.page wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src={{URL::asset('bower_components/jquery/dist/jquery.min.js')}}></script>
    <!-- Bootstrap Core JvaScript -->
    <script src={{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js')
    }}></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src={{ URL::asset('bower_components/metisMenu/dist/metisMenu.min.js')
     }}></script>

@yield('js')
<!-- Custom Theme JavaScript -->
    <script src={{ URL::asset('dist/js/sb-admin-2.js') }}></script>
    @yield('jsope')
</boby>
</html>
