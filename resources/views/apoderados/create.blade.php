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
                    Ingrese los datos del Apoderado
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="/apoderados" autocomplete="off">
                                @if (count($errors)>0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>{{ $error}}</li>
                                        @endforeach
                                    </ul> 
                                </div>
                                @endif                      
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <div class="form-group">
                                    <label>DNI APODERADO</label>
                                    <input type="text" class="form-control" placeholder="12345678" name="dni" value="{{old('dni')}}">
                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" placeholder="Yeraldo" name="nombre" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control" placeholder="Mollinedo Pe" name="apellido" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <select name="sexo" class="form-control">
                                        <option value="" selected="">Elije una Opcion</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>                                                            
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control" placeholder="APV Fedetac #123" name="direccion" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select name="estadocv" class="form-control">
                                        <option value="" selected="">Elije una Opcion</option>
                                        <option value="Habilitado">Habilitado</option>
                                        <option value="Desabilitado">Desabilitado</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="text" class="form-control" placeholder="900000000" name="telefono" style="text-transform: lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();">
                                </div>
                                
                                <!--<div class="form-group">
                                    <label>Numero de hijos</label>
                                    <input type="text" class="form-control" placeholder="3" name="numhijos">
                                </div> -->
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="reset" class="btn btn-warning">Limpiar</button>
                                <button type="button" class="btn btn-danger" onclick="location.href='/apoderados'">Volver</button>
                            </form>
                        </div>
                        @stop
                    </div>
                </div>
            </div>
        </div>
    </div>