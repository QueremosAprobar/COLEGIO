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
                    OTORGAR ASIGNACION
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="POST" action="/asignaciones/{{ $docente->dnidocente }}" autocomplete="off">
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



                                    <div class="form-group">
                                        <label>NOMBRE</label>
                                        <input type="text" class="form-control" value="{!! $docente->nombre !!}" name="nombre" disabled="">
                                    </div>
                                    <div class="form-group">
                                        <label>NIVEL</label>
                                        <input type="text" class="form-control" value="{!! $docente->nivel !!}" name="nivel" disabled="">
                                    </div>
                                    @if($docente->nivel!="SECUNDARIA")
                                      @if($cursos!=NULL)
                                      <div class="form-group">
                                          <label>CURSO</label>
                                          <select id="curso" name="curso" class="form-control">
                                            @<?php foreach ($cursos as $curso): ?>
                                              <option value="{!!$curso->idcurso!!}"> {!!$curso->nombre!!}</option>
                                            <?php endforeach; ?>

                                          </select>
                                      </div>
                                      @endif
                                    @else
                                      <div class="form-group">
                                          <label>CURSO</label>
                                          <input type="text" class="form-control" value="{!! $docente->especialidad !!}" name="curso" disabled="">
                                      </div>
                                    @endif
                                    @if($docente->nivel=="SECUNDARIA")
                                      @if($gradoseccion==NULL)
                                      <div class="form-group">
                                          <label>GRADO Y SECCION</label>
                                          <input type="text" class="form-control" value="MATRICULE ALUMNOS" name="nivel" disabled="">
                                      </div>
                                        @else
                                      <div class="form-group">
                                          <label>GRADO Y SECCION</label>
                                          <select id="gradoseccion" name="gradoseccion" class="form-control">
                                            @foreach ($gradoseccion as $grados)
                                              <option value="{!!$grados->grado!!}!{!!$grados->seccion!!}">{!!$grados->grado!!}  -  {!!$grados->seccion!!}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                        @endif
                                    @else
                                    <div class="form-group">
                                        <label>GRADO Y SECCION</label>
                                        <select id="gradoseccion" name="gradoseccion" class="form-control">
                                          <option value='{!!$asignacionp->grado!!}!{!!$asignacionp->seccion !!}' >{!!$asignacionp->grado!!} - {!!$asignacionp->seccion !!}</input>
                                        </select>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                    <label>DIA</label>
                                    <select id="dia" name="dia" class="form-control">
                                    @if($dia=='1')
                                    <option value='Lunes' >LUNES</input>
                                    @elseif($dia=='2')
                                    <option value='Martes' >MARTES</input>
                                    @elseif($dia=='3')
                                    <option value='Miercoles' >MIERCOLES</input>
                                    @elseif($dia=='4')
                                    <option value='Jueves' >JUEVES</input>
                                    @elseif($dia=='5')
                                    <option value='Viernes' >VIERNES</input>
                                    @endif
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <label>HORA</label>
                                        <select id="hora" name="hora" class="form-control">
                                        <option value='{!!$hora!!}' >{!!$hora!!}</input>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>ESTADO DE ASIGNACION</label>

                                        <select id="ESTADO" name="estado" class="form-control">
                                                <option selected >HABILITADO</option>
                                                <option>INHABILITADO</option>
                                        </select>
                                    </div>
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="button" class="btn btn-danger" onClick="location.href='/asignaciones/{!!$docente->dnidocente!!}/'">Volver</button>
                            </form>
                        </div>
                        @stop
                    </div>
                </div>
            </div>
        </div>
    </div>
