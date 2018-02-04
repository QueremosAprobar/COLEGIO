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
                    Modificar Años
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="/anios/{{ $anios-> idanio}}" autocomplete="off">
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
                                    <label>ID Año</label>
                                    <input type="text" class="form-control" value="{!! $anios->idanio !!}" name="idanio" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                
                                 <div class="form-group">
                                    <label>Fecha de Inicio</label>
                                    <input type="date" name="fechaini" class="form-control" value="{!! $anios-> fechaini!!}"name="fechanac">
                                </div>

                                 <div class="form-group">
                                    <label>Fecha de Fin</label>
                                    <input type="date" name="fechafin" class="form-control" value="{!! $anios-> fechafin!!}"name="fechanac">
                                </div>

                                    <div class="form-group">
                                        <label>ESTADO</label>

                                        <select id="ESTADO" name="estado" class="form-control">
                                            @if($anios->estado=="HABILITADO")
                                                <option selected >HABILITADO</option>
                                                <option>INHABILITADO</option>
                                            @else
                                                <option>HABILITADO</option>
                                                <option selected>INHABILITADO</option>
                                            @endif
                                        </select>
                                    </div> 

                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="reset" class="btn btn-warning">Limpiar</button>
                                <button type="button" class="btn btn-danger" onClick="location.href='/anios'">Volver</button>
                            </form>
                        </div>
                        @stop
                    </div>
                </div>
            </div>
        </div>
    </div>