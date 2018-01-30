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
            <h3 class="page-header">Aulas
                <button type="button" class="btn btn-primary" onclick="location.href='aulas/create'">
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
                        @if($aulas->isEmpty())
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    x
                                </button>
                                No se tiene ningun Aula
                                <a href="#" class="alert-link">Ingrese Aula</a>
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
                                    <th>Id Aula</th>
                                    <th>Tipo</th>
                                    <th>Capacidad</th>
                                    <th>Operaciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($aulas as $aula)
                                    <tr class="odd gradeA" rol="row">
                                        <td>{{ $aula->idaula }}</td>
                                        <td>{{ $aula->tipo }}</td>
                                        <td>{{ $aula->capacidad }}</td>
                                        <td class="center">
                                            <ul class="nav nav-pills">
                                                <li>
                                                    <a href="{!! action('AulaController@show', $aula->idaula) !!}" title="Ver">
                                                        <spam class="glyphicon glyphicon-search"></spam>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{!! action('AulaController@edit', $aula->idaula) !!}" title="Editar">
                                                        <spam class="glyphicon glyphicon-pencil"></spam>
                                                    </a>
                                                </li>
                                                <li>
                                                    <form method="post" action="{!! action('AulaController@destroy', $aula->idaula) !!}" onclick="return confirm('Se eliminara este registro, Esta seguro?');">
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