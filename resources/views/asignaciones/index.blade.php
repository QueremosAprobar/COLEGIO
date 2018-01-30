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
                    Datos del Docente
                </div></label>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" >

                                <div class="form-group ">
                                    <label>DNI DOCENTE</label>
                                    <input type="text" class="form-control" value="{!! $docente->dnidocente !!}" disabled="" >
                                </div>

                                <div class="form-group ">
                                    <label>NOMBRES</label>
                                    <input type="text" class="form-control" value="{!! $docente->nombre !!}" style="text-transform:uppercase;" onkeyup="javascript:this.value.toUpperCase();" disabled="" >
                                </div>
                                <div class="form-group ">
                                    <label>APELLIDOS</label>
                                        <input type="text" class="form-control" value="{!! $docente->apellido !!}" style="text-transform: uppercase;" onkeyup="javascript:this.value.toUpperCase();" disabled="" >
                                </div>


                                <div class="form-group ">
                                    <label>ESPECIALIDAD</label>
                                    <input type="text" class="form-control" value="{!! $docente->especialidad !!}" disabled="" >
                                </div>

                                <button type="button" class="btn btn-danger" onClick="location.href='/docentes'">Volver</button>
                                <button type="button" class="btn btn-primary pull-right" onClick="#">Cargar Horario</button>
                                <br><br>
                                <table class="table table-bordered table-responsive table-striped">
                                  <thead class="bg-info text-white">
                                    <th>HORA</th>
                                    <th>Lunes</th>
                                    <th>Martes</th>
                                    <th>Miercoles</th>
                                    <th>Jueves</th>
                                    <th>Viernes</th>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td class="bg-info text-white">[8.00;8.30]</td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td class="bg-info text-white">[8.30;9.00]</td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td class="bg-info text-white">[8.30;9.00]</td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td class="bg-info text-white">[8.30;9.00]</td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td class="bg-info text-white">[8.30;9.00]</td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td class="bg-info text-white">[8.30;9.00]</td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                                  </tbody>
                                </table>


                            </form>
                        </div>
                    </div>
                </div>
            </div>

@stop
