@extends('layout.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
            </h3>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="page-header">
                    FICHA DE MATRICULA DEL ALUMNO {{ $id }}
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                          <form role="form" method="post" action="/matriculas/{{ $id}}" autocomplete="off">
                              @foreach($errors->all() as $error)
                                  <div class="alert alert-danger">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                          x
                                      </button>
                                      {{ $error }}
                                  </div>
                              @endforeach
                                  {!! csrf_field() !!}
                                  {!! method_field('PUT') !!}
                          @if($codvalidacion < 1)

                          @foreach($numeros as $n)

                          <label> Nro Matricula</label>
                          <input type="" class="form-control" name="nromatricula" value="{{$n+1}}" style="text-transform: lowercase;" onkeyup="javascript:this.value.toLowerCase();" >
                          @endforeach
                          @else
                          <div>
                            <h1 class="alert-danger" >EL ALUMNO YA ESTA MATRICULADO </n1>
                          </div>
                          @endif
                          <div class="form-group">
                                  <label>Fecha de Matricula</label>
                                  <input id="fechamat" name="fechamat"  type ="date" placeholder="Fecha de Apertura" class="form-control" >
                          </div>
                          <div class="form-group">
                                  <label>Nivel</label>
                                  <input type="text" class="form-control" value="{{$nivel}}" name="nivel" placeholder="ejemplo 1ro">
                        </div>
                        <div class="form-group">
                                  <label>Grado</label>
                                  <input type="text" class="form-control" value="{{$gradoV}}" name="grado" placeholder="ejemplo 1ro">
                        </div>
                        <div class="form-group">
                              <label>Seccion </label>
                              <input type="text" class="form-control" name="seccion" value="{{$seccion}}" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>

                        <div class="form-group">
                            <label>Turno </label>
                            <select name="turno" class="form-control">
                                <option value="MAÑANA">MAÑANA</option>
                                <option value="TARDE">TARDE</option>
                                <option value="NOCTURNA">NOCTURNA</option>
                            </select>
                        </div>
                        <div class="form-group">
                              <label>Situacion del Estudiante en el año anterior</label>
                              <input type="text" class="form-control" name="situacion" value="{{$estado}}" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>
                        @foreach($apo as $ap)
                        <div class="form-group">
                              <label>DNI del Apoderado </label>
                              <input type="text" class="form-control" value="{{$ap->dniapoderado}}" name="dniapoderado">
                        </div>
                        @endforeach
                        <div class="form-group">
                            <label>DNI del Alumno </label>
                            <input type="text" class="form-control" value="{{$id}}" name="dnialumno" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>

                        <div class="form-group">
                            <label>AÑO </label>
                            <input type="text" class="form-control" value="{{$anio }}" name="idanio" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" >
                        </div>
              					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
              						<thead>
              							<tr>
              								<th>IdCurso</th>
                              <th>nombre</th>
                              <th>nivel</th>
                              <th>grado</th>
              								<th>nota1</th>
              								<th>nota2</th>
              								<th>nota3</th>
              								<th>promedio</th>
              							</tr>
              						</thead>
              						<body>
                            @foreach($tablacursonotas as $mat)
                            <tr class="odd gradeA" rol="row">
                              <td>{{$mat->idcurso}}</td>
                              <td>{{$mat->nombre}} </td>
                              <td>{{$mat->nivel}}</td>
                              <td>{{$mat->grado}}</td>
                              <td>{{$mat->p1}}</td>
                              <td>{{$mat->p2}}</td>
                              <td>{{$mat->p3}}</td>
                              <td>{{$mat->promedio}}</td>
                            </tr>
                            @endforeach
              						</body>
              					</table>
                        <button type="submit" class="btn btn-success" onClick="location.href='/matriculas'">Guardar</button>
                        <button type="reset" class="btn btn-warning">Limpiar</button>
                        <button type="button" class="btn btn-danger" onClick="location.href='/matriculas'">Volver</button>
                        </form>
                        </div>
                        @stop
                    </div>
                </div>
            </div>
        </div>
    </div>
