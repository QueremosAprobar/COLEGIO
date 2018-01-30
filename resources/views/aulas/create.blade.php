@extends('layout.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
        </div>
        {{--/.col-lg-12--}}
    </div>
    {{--/.row--}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Ingrese datos del Aula
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="/aulas" autocomplete="off">
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            x
                                        </button>
                                        {{ $error }}
                                    </div>
                                @endforeach
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                                <div class="form-group">
                                    <label>ID Aula</label>
                                    <input type="text" class="form-control" name="idaula" placeholder="A001" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>


                                <div class="form-group">
                                    <label>Tipo</label>
                                    <input type="text" class="form-control" name="tipo" placeholder="PRIMARIA" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>


                                <div class="form-group">
                                    <label>Capacidad</label>
                                    <input type="text" class="form-control" name="capacidad" placeholder="max 40 alumnos" >
                                </div>



                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="reset" class="btn btn-warning">Limpiar</button>
                                <button type="button" class="btn btn-danger" onclick="location.href='/aulas'">Volver</button>
                            </form>
                        </div>
                        @stop
                    </div>
                </div>
            </div>
        </div>
    </div>