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
                    Modificar Registro Matricula
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="/mantenimientos/{{ $matricula-> nromatricula }}" autocomplete="off">
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
                                    <label>Nro Matricula</label>
                                    <input type="text" class="form-control" value="{!! $matricula->nromatricula !!}" name="nromatricula" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group">
                                    <label>Fecha De Matricula</label>
                                    <input type="detatime" class="form-control" value="{!! $matricula->fechamat !!}" name="fechamat" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group">
                                    <label>Nivel</label>
                                    <input type="text" class="form-control" value="{!! $matricula->nivel !!}" name="nivel" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>

                                <div class="form-group">
                                    <label>Grado</label>
                                    <input type="text" class="form-control" value="{!! $matricula->grado !!}" name="grado">
                                </div>

                                <div class="form-group">
                                    <label>Seccion</label>
                                    <input type="text" class="form-control" value="{!! $matricula->seccion !!}" name="seccion" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>

                                <div class="form-group">
                                    <label>Turno</label>
                                    <input type="text" class="form-control" value="{!! $matricula->turno !!}" name="turno" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>

                                <div class="form-group">
                                    <label>Situacion</label>
                                    <input type="text" class="form-control" value="{!! $matricula->situacion !!}" name="situacion" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>

                                <div class="form-group">
                                    <label>DNI Alumno</label>
                                    <input type="text" class="form-control" value="{!! $matricula->dnialumno !!}" name="dnialumno">
                                </div>
                                <div class="form-group">
                                    <label>DNI Apoderado</label>
                                    <input type="text" class="form-control" value="{!! $matricula->dniapoderado !!}" name="dniapoderado" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>

                                <div class="form-group">
                                    <label>ID Anio</label>
                                    <select select name="idanio" class="form-control">

                                    @foreach($idanio as $A)
                                    <option value="{{ $A->idanio }} ">{{ $A->idanio }}</option>
                                    @endforeach
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-success">Guardar</button>
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
