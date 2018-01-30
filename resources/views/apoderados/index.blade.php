@extends('layout.layout')

@section('estilos')
    <!-- Datatables CSS -->
    <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
    <!-- DataTables Responsive CSS -->
    <script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@stop
@section('Titulo')
      <i class="fa fa-gear fa-fw"></i>
      <a1>Mantenimiento de Apoderados<a1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Apoderado
                <button type="button" class="btn btn-primary" onclick="location.href='apoderados/create'">
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
                        @if($apoderados->isEmpty())
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    x
                                </button>
                                No se tiene ningun apoderado
                                <a href="#" class="alert-link">Ingrese Apoderados</a>
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
                                    <th>Sexo</th>
                                    <th>Direccion</th>                                    
                                    <th>Telefono</th>
                                    <th>Estado</th>                                    
                                    <th>Operaciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($apoderados as $apoderado)

                                    <tr class="odd gradeA" rol="row">
                                        <td>{{ $apoderado->dniapoderado }}</td>
                                        <td>{{ $apoderado->nombre }} {{ $apoderado->apellido }}</td>
                                        <td>{{ $apoderado->sexo }}</td>
                                        <td>{{ $apoderado-> direccion }}</td>                                        
                                        <td>{{ $apoderado-> telefono }}</td>
                                        <td>{{ $apoderado-> estadocv }}</td>                                        
                                    </select>                                    
                                </div>
                                        <td class="center">
                                            <ul class="nav nav-pills">
                                                <li>
                                                    <a href="{!! action('ApoderadoController@show', $apoderado->dniapoderado)  !!}" title="Ver">
                                                        <spam class="glyphicon glyphicon-search"></spam>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{!! action('ApoderadoController@edit', $apoderado->dniapoderado) !!}" title="Editar">
                                                        <spam class="glyphicon glyphicon-pencil"></spam>
                                                    </a>
                                                </li>
                                                <li>
                                                    <form method="post" action="{!! action('ApoderadoController@destroy', $apoderado->dniapoderado) !!}" onclick="return confirm('Se eliminara este registro, Esta seguro?');">
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