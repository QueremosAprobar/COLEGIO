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
            <h3 class="page-header">Año
                <button type="button" class="btn btn-primary" onclick="location.href='anios/create'">
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
                    <div class="dataTables_wrapper">
                        @if($anios->isEmpty())
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    x
                                </button>
                                No se tiene ningun Año registrado
                                <a href="#" class="alert-link">Ingrese Año</a>
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
                                    <th>ID Año</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha de Fin</th>
                                    <th>Estado</th>
                                     <th>Operaciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($anios as $anio)

                                    <tr class="odd gradeA" rol="row">
                                        <td>{{ $anio->idanio }}</td>
                                        <td>{{ $anio->fechaini }}</td>
                                        <td>{{ $anio->fechafin }}</td>
                                        <td>{{ $anio->estado }}</td>
                                        <td class="center">
                                            <ul class="nav nav-pills">
                                                <li>
                                                    <a href="{!! action('AnioController@edit', $anio->idanio) !!}" title="Editar">
                                                        <spam class="glyphicon glyphicon-pencil"></spam>
                                                    </a>
                                                </li>
                                                <li>
                                                    @if($anio->estado == "INHABILITADO")
                                                        <button data-target="#confirmar-{{ $anio->idanio}}" data-toggle="modal" >
                                                            <a title="HABILITAR">
                                                                <spam class="glyphicon glyphicon-star"></spam>
                                                            </a></button>
                                                    @else
                                                        <button data-target="#confirmar-{{ $anio->idanio}}" data-toggle="modal">
                                                            <a  title="DESHABILITAR">
                                                                <spam class="glyphicon glyphicon-alert"></spam>
                                                            </a></button>
                                                    @endif
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <div class="modal fade modal-slide-in-rigth" aria-hidden="true"
                                         role="dialog" tabindex="-1" id="confirmar-{{$anio->idanio}}">
                                        <form action="/anios/{{ $anio->dnianio }}" method="post">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                                                            <span aria-hidden="true">X</span>
                                                        </button>
                                                        <h3 class="modal-title">ESTADO DEL ANIO?</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if($anio->estado == 'HABILITADO')
                                                            <p>¿Esta seguro de  INHABILITAR el año?</p>
                                                        @else
                                                            <p>¿Esta seguro de  HABILITAR el año?</p>
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