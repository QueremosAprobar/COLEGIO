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
                    Modificar Aula
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="/aulas/{{ $aula->idaula }}" autocomplete="off">
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
                                    <label>ID Aula</label>
                                    <input type="text" class="form-control" value="{!! $aula->idaula !!}" name="idaula" >
                                </div>
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <input type="text" class="form-control" value="{!! $aula->tipo !!}" name="tipo" >
                                </div>
                                <div class="form-group">
                                    <label>Capacidad</label>
                                    <input type="text" class="form-control" value="{!! $aula->capacidad !!}" name="capacidad">
                                </div>

                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="reset" class="btn btn-warning">Limpiar</button>
                                <button type="button" class="btn btn-danger" onClick="location.href='/aulas'">Volver</button>
                            </form>
                        </div>
                        @stop
                    </div>
                </div>
            </div>
        </div>
    </div>