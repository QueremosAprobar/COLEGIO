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
                    Datos del Curso
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" >
                                 <div class="form-group ">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" value="{!! $curso->nombre !!}">
                                </div>
                                <div class="form-group ">
                                    <label>Nivel</label>
                                    <input type="text" class="form-control" value="{!! $curso->nivel !!}" >
                                </div>
                                <div class="form-group ">
                                    <label>Grado</label>
                                    <input type="text" class="form-control" value="{!! $curso->gradp !!}">
                                </div>
                                <button type="button" class="btn btn-danger" onClick="location.href='/cursos'">Volver</button>
                            </form>
                        </div>
@stop