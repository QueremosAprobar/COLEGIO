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
                    Modificar Alumno
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="/alumnos/{{ $alumno-> dnialumno}}" autocomplete="off">
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
                                    <label>DNI</label>
                                    <input type="text" class="form-control" value="{!! $alumno->dnialumno !!}" name="dnialumno">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" value="{!! $alumno-> contraseña!!}" name="contraseña">
                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" value="{!! $alumno-> nombre!!}" name="nombre" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control" value="{!! $alumno-> apellido!!}" name="apellido" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                 <div class="form-group">
                                    <label>Fecha de Nacimiento</label>
                                    <input type="datetime" class="form-control" value="{!! $alumno-> fechanac!!}"name="fechanac">
                                </div>

                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="text" class="form-control" value="{!! $alumno-> telefono!!}" name="telefono">
                                </div>                             
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <select name="sexo" class="form-control">
                                        <option value="">ELIJA UNA OPCION</option>
                                        <option value="M" @if($alumno->sexo == "M") selected="" @endif >MASCULINO</option>
                                        <option value="F" @if($alumno->sexo == "F") selected="" @endif >FEMENINO</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{!! $alumno-> email!!}" name="email">
                                </div>
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control" value="{!! $alumno-> direccion!!}" name="direccion" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select name="estadoal" class="form-control">
                                        <option value="" selected="">Elije una Opcion</option>
                                        <option value="Habilitado">HABILITADO</option>
                                        <option value="Desabilitado">INHABILITADO</option>
                                    </select>
                                </div>                                                               
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="reset" class="btn btn-warning">Limpiar</button>
                                <button type="button" class="btn btn-danger" onClick="location.href='/alumnos'">Volver</button>
                            </form>
                        </div>
                        @stop
                    </div>
                </div>
            </div>
        </div>
    </div>