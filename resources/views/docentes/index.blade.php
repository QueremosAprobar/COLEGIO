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
            <h3 class="page-header">Docentes
                <button type="button" class="btn btn-primary" onclick="location.href='docentes/create'">
                    Nuevo
                </button>
            </h3>
        </div>
        <!-- col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"></div>
                <!--.panel-heading-->
                <div class="panel-body">
                    <div class="dataTables" style="overflow-x: auto"> {{--Scroll!!!!--}}
                        @if($docentes->isEmpty())
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    x
                                </button>
                                No se tiene ningun Docente
                                <a href="#" class="alert-link">Ingrese Docente</a>
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

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>DNI</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Telefono</th>
                                    <th>Nivel</th>
                                    <th>Especialidad</th>
                                    <th>Sexo</th>
                                    <th>Estado</th>
                                    <th>Operaciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($docentes as $docente)

                                    <tr class="odd gradeA" rol="row">
                                        <td>{{ $docente->dnidocente }}</td>
                                        <td>{{ $docente->nombre }}</td>
                                        <td>{{ $docente->apellido }}</td>
                                        <td>{{ $docente->telefono }}</td>
                                        <td>{{ $docente->nivel }}</td>
                                        @if($docente->nivel == "SECUNDARIA")
                                            <td>{{ $docente->especialidad }}</td>
                                        @else
                                            <td>{{ $docente->especialidad =""}}</td>
                                        @endif
                                        {{--combobox de especialidad--}}
                                        <td>{{ $docente->sexo }}</td>
                                        {{--combobox de sexo--}}
                                        <td>{{ $docente->estado }}</td>
                                        <td class="center">
                                            <ul class="nav nav-pills">

                                                    <a href="{!! action('AsignacionController@show', $docente->dnidocente) !!}" title="Asignar carga">
                                                        <spam class="glyphicon glyphicon-calendar"></spam>
                                                    </a>

                                                    <a href="{!! action('DocenteController@show', $docente->dnidocente) !!}" title="Ver">
                                                        <spam class="glyphicon glyphicon-search"></spam>
                                                    </a>


                                                    <a href="{!! action('DocenteController@edit', $docente->dnidocente) !!}" title="Editar">
                                                        <spam class="glyphicon glyphicon-pencil"></spam>
                                                    </a>

                                                    @if($docente->estado == "INHABILITADO")
                                                        <button data-target="#confirmar-{{ $docente->dnidocente}}" data-toggle="modal" >
                                                            <a title="HABILITAR">
                                                                <spam class="glyphicon glyphicon-star"></spam>
                                                            </a></button>
                                                    @else
                                                        <button data-target="#confirmar-{{ $docente->dnidocente}}" data-toggle="modal">
                                                            <a  title="DESHABILITAR">
                                                                <spam class="glyphicon glyphicon-alert"></spam>
                                                            </a></button>
                                                    @endif

                                            </ul>
                                        </td>
                                    </tr>

                                    <div class="modal fade modal-slide-in-rigth" aria-hidden="true"
                                         role="dialog" tabindex="-1" id="confirmar-{{$docente->dnidocente}}">
                                        <form action="/docentes/{{ $docente->dnidocente }}" method="post">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                                                            <span aria-hidden="true">X</span>
                                                        </button>
                                                        <h3 class="modal-title">ESTADO DEL DOCENTE</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if($docente->estado == 'HABILITADO')
                                                            <p>¿Esta seguro de  INHABILITAR al docente?</p>
                                                        @else
                                                            <p>¿Esta seguro de  HABILITAR al docente?</p>
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
            $('#dataTables-example').DataTable({
                responsive:true,
                searching:true
            });
        });
    </script>
@stop
