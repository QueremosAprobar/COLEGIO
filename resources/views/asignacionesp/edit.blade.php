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
                    Detalles  Docente
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="POST" action="/asignacionesp/{{ $docente->dnidocente }}" autocomplete="off">
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

                                    <div class="form-group">
                                        <label>TURNO</label>
                                        <select id="turno" name="turno" class="form-control">
                                                <option selected >MAÑANA</option>
                                                @if($docente->nivel!="INICIAL")
                                                  <option>TARDE</option>
                                                @endif
                                        </select>
                                    </div>

                                    @if($docente->nivel!="SECUNDARIA")
                                    <div class="form-group">
                                        <label>GRADO Y SECCION</label>
                                        <select id="gradoseccion" name="gradoseccion" class="form-control">
                                          @foreach ($gradoseccion as $grados)
                                            <option value="{!!$grados->grado!!}!{!!$grados->seccion!!}">{!!$grados->grado!!} - {!!$grados->seccion!!}</option>
                                          @endforeach

                                        </select>

                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label>ESTADO DE ASIGNACION</label>

                                        <select id="ESTADO" name="estado" class="form-control">
                                                <option selected >HABILITADO</option>
                                                <option>INHABILITADO</option>
                                        </select>
                                    </div>
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="button" class="btn btn-danger" onClick="location.href='/asignaciones/{!!$docente->dnidocente!!}'">Volver</button>
                            </form>
                        </div>
                        @stop
                    </div>
                </div>
            </div>
        </div>
    </div>
