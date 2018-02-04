@extends('layout.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Notas alumno
                </div></label>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form"class="form-vertical" action="" >
                                <P>Notas del alumno</p>
                                <table class="table  table-responsive table-condensed table-bordered">
                                  <thead class="bg-info text-white">
                                    <th>Cursos</th>
                                    <th>Nota 1</th>
                                    <th>Nota 2</th>
                                    <th>Nota 3</th>
                                    <th>Promedio</th>
                                  </thead>
                                  <tbody>
                                    <?php $opcion=true ?>
                                      <?php foreach ($notas as $notas):?>
                                        <tr>
                                        @if($notas!=NULL and $opcion==true)
                                          <td class="text-info">{{$notas->nombre}}</td>
                                          <td>{{$notas->p1}}</td>
                                          <td>{{$notas->p2}}</td>
                                          <td>{{$notas->p3}}</td>
                                          <td>{{$notas->promedio}}</td>
                                          <?php $opcion=true ?>
                                        @else
                                          <?php $opcion=false ?>
                                          <td>inserte notas</td>
                                          <td>inserte notas</td>
                                          <td>inserte notas</td>
                                          <td>inserte notas</td>
                                          <td>inserte notas</td>
                                        @endif
                                        </tr>
                                      <?php endforeach ?>

                                  </tbody>
                                </table>
                                <button type="button" class="btn btn-danger" onclick="location.href='/viewalumnos'">Volver</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
@stop
