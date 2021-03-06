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
                                                @if($alumno->estadoal == "INHABILITADO")
                                                        <button data-target="#confirmar-{{ $alumno->dnialumno}}" data-toggle="modal" >
                                                            <a title="HABILITAR">
                                                                <spam class="glyphicon glyphicon-star"></spam>
                                                            </a></button>
                                                    @else
                                                        <button data-target="#confirmar-{{ $alumno->dnialumno}}" data-toggle="modal">
                                                            <a  title="INHABILITAR">
                                                                <spam class="glyphicon glyphicon-alert"></spam>
                                                            </a></button>
                                                    @endif
                                            </ul>
                                        </td>
                                    </tr>
                                    <div class="modal fade modal-slide-in-rigth" aria-hidden="true"
                                         role="dialog" tabindex="-1" id="confirmar-{{$alumno->dnialumno}}">
                                        <form action="/alumnos/{{ $alumno->dnialumno }}" method="post">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                                                            <span aria-hidden="true">X</span>
                                                        </button>
                                                        <h3 class="modal-title">ESTADO DEL DOCENTE</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if($alumno->estado == 'HABILITADO')
                                                            <p>¿Esta seguro de  INHABILITAR al alumno?</p>
                                                        @else
                                                            <p>¿Esta seguro de  HABILITAR al alumno?</p>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE')}}
                                                        <button type="submit"  class="btn btn-success">Si</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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