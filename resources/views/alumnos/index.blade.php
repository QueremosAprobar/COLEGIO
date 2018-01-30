@extends('layout.layout')

@section('estilos')
    <!-- Datatables CSS -->
    <script src={{
    URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
    <!-- DataTables Responsive CSS -->

    <script src={{
    URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>

@stop

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Alumnos
                <button type="button" class="btn btn-primary" onclick="location.href='alumnos/create'">
                    Nuevo
                </button>
            </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"></div>
                <!--.panel-heading-->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        @if($alumnos->isEmpty())
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    x
                                </button>
                                No se tiene ningun alumno
                                <a href="#" class="alert-link">Ingrese Alumnos</a>
                            </div>
                        @else
                            @if(session('mensaje'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        x
                                    </button>
                                    {{ session('mensaje') }}
                                </div>
                            @endif

                            <table class="table table-striped table-bordered table-hover" dnialumno="dataTables-example">
                                <thead>
                                <tr>
                                    <th>DNI</th>
                                    <th>Nombres y Apellidos</th>
                                    <th>Sexo</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Operaciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($alumnos as $alumno)

                                    <tr class="odd gradeA" rol="row">
                                        <td>{{ $alumno->dnialumno }}</td>
                                        <td>{{ $alumno->nombre }} {{ $alumno->apellido }}</td>
                                        <td>{{ $alumno->sexo }}</td>
                                        <td>{{ $alumno->fechanac }}</td>
                                        <td class="center">
                                            <ul class="nav nav-pills">
                                                <li>
                                                    <a href="{!! action('AlumnoController@show', $alumno->dnialumno) !!}" title="Ver">
                                                        <spam class="glyphicon glyphicon-search"></spam>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{!! action('AlumnoController@edit', $alumno->dnialumno) !!}" title="Editar">
                                                        <spam class="glyphicon glyphicon-pencil"></spam>
                                                    </a>
                                                </li>
                                                <li>
                                                    <form method="post" action="{!! action('AlumnoController@destroy', $alumno->id) !!}" onclick="return confirm('Se eliminara este registro, Esta seguro?');">
                                                        {!! csrf_field() !!}
                                                        {!! method_field('DELETE') !!}
                                                        <div>
                                                            <button type="submit" class="btm brn_defauld"><span class="glyphicon glyphicon-trash"></span></button>
                                                        </div>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <!--.table-rsponsive-->
                </div>
            </div>

        </div>

    </div>

@stop

@section('js')
    <!--Datatables JavaScript-->
    <script src={{ URL::asset('bower_components/DataTables/media/js/jquery.dataTables.min.js') }}></script>


    <script src={{ URL::asset('bower_components/dataTables-plugins/integration/bootstrap/3/.dataTables.bootstrap.min.js') }}></script>


@stop

@section('jsope')

    <!--Page-Level Demo Scripts - Tables- Use for reference-->
    <script>
        $(document).ready(function () {
            $('dataTables-example').DataTable({
                responsive:true
            });
        });
    </script>
@stop