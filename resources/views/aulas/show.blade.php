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
                    Datos del Aula
                </div></label>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" >
                                <div class="form-group ">
                                    <label>ID Aula</label>
                                    <input type="text" class="form-control" value="{!! $aula->idaula !!}"  disabled="" >
                                </div>
                                <div class="form-group ">
                                    <label>Tipo</label>
                                    <input type="text" class="form-control" value="{!! $aula->tipo !!}" disabled="" >
                                </div>

                                <div class="form-group ">
                                    <label>Capacidad</label>
                                    <input type="text" class="form-control" value="{!! $aula->capacidad !!}" disabled="" >
                                </div>


                                <button type="button" class="btn btn-danger" onClick="location.href='/aulas'">Volver</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@stop