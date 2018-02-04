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
                    Datos De La Matricula
                </div></label>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" >
                                <div class="form-group ">
                                    <label>ID Matricula</label>
                                    <input type="text" class="form-control" value="{!! $matricula->nromatricula !!}"  disabled="" >
                                    
                                    <label>Fecha de Matricula</label>
                                    <input type="text" class="form-control" value="{!! $matricula->fechamat !!}" disabled="" >

                                    <label>Nivel</label>
                                    <input type="text" class="form-control" value="{!! $matricula->nivel !!}" disabled="" >

                                    <label>Grado</label>
                                    <input type="text" class="form-control" value="{!! $matricula->grado !!}" disabled="" >

                                    <label>Seccion</label>
                                    <input type="text" class="form-control" value="{!! $matricula->seccion !!}" disabled="" >

                                    <label>Turno</label>
                                    <input type="text" class="form-control" value="{!! $matricula->turno !!}" disabled="" >

                                    <label>Situacion</label>
                                    <input type="text" class="form-control" value="{!! $matricula-> situacion !!}" disabled="" >

                                    <label>DNI Alumno</label>
                                    <input type="text" class="form-control" value="{!! $matricula->dnialumno !!}" disabled="" >

                                    <label>DNI Apoderado</label>
                                    <input type="text" class="form-control" value="{!! $matricula->dniapoderado !!}" disabled="" >

                                    <label>AÑO</label>
                                    <input type="text" class="form-control" value="{!! $matricula->idanio !!}" disabled="" >

                                    

                                <button type="button" class="btn btn-danger" onClick="location.href='/matriculas'">Volver</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@stop