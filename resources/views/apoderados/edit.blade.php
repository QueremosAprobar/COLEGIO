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
                    Modificar Apoderado
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="/apoderados/{{ $apoderado->dniapoderado }}" autocomplete="off">
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
                                <div class="form-group ">
                                    <label>DNI</label>
                                    <input type="text" class="form-control" value="{!! $apoderado->dniapoderado !!}" disabled="">
                                </div> 
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" value="{!! $apoderado->nombre !!}" name="nombre" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control" value="{!! $apoderado->apellido !!}" name="apellido" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <select name="sexo" class="form-control" value ="{!! $apoderado->sexo !!}">
                                        <option value="">ELIJA UNA OPCION</option>
                                        <option value="M" @if($apoderado->sexo == "M") selected="" @endif >MASCULINO</option>
                                        <option value="F" @if($apoderado->sexo == "F") selected="" @endif >FEMENINO</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control" value="{!! $apoderado->direccion !!}" name="direccion" style="text-transform: lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();">
                                </div>

                                <div class="form-group">
                                    <label>Estado</label>
                                    <select type="text" class="form-control" value="{!! $apoderado->estadocv !!}" name="estadocv">
                                        <option value="" selected="">Elije una Opcion</option>
                                        <option value="Habilitado" @if($apoderado->estadocv == "Habilitado") selected="" @endif >Habilitado</option>
                                        <option value="Desabilitado" @if($apoderado->estadocv == "Desabilitado") selected="" @endif >Desabilitado</option>                                                                   
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="text" class="form-control" value="{!! $apoderado->telefono !!}" name="telefono" style="text-transform: lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();">
                                </div>
                                <!--<div class="form-group">
                                    <label>Numero de hijos</label>
                                    <input type="text" class="form-control" placeholder="3" name="numhijos">
                                </div> -->
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="reset" class="btn btn-warning">Limpiar</button>
                                <button type="button" class="btn btn-danger" onClick="location.href='/apoderados'">Volver</button>
                            </form>
                        </div>
                        @stop
                    </div>
                </div>
            </div>
        </div>
    </div>