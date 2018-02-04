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
                    Datos del Alumno
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" >
                                 <div class="form-group ">
                                    <label>DNI</label>
                                    <input type="text" class="form-control" value="{!! $alumno->dnialumno !!}" disabled="" >
                                </div>
                                <div class="form-group ">
                                    <label>Contraseña</label>
                                    <input type="text" class="form-control" value="{!! $alumno->contraseña !!}" style="text-transform:uppercase;" onkeyup="javascript:this.value.toUpperCase();" disabled="" >
                                </div>
                                <div class="form-group ">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" value="{!! $alumno->nombre !!}" style="text-transform:uppercase;" onkeyup="javascript:this.value.toUpperCase();" disabled="" >
                                </div>
                                <div class="form-group ">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control" value="{!! $alumno->apellido !!}" style="text-transform: uppercase;" onkeyup="javascript:this.value.toUpperCase();" disabled="" >
                                </div>
                                 <div class="form-group">
                                    <label>Fecha de Nacimiento</label>
                                    <input type="datetime" class="form-control" value="{!! $alumno->fechanac !!}" disabled="" >
                                </div>
                                 <div class="form-group ">
                                    <label>Telefono</label>
                                    <input type="tel" class="form-control" value="{!! $alumno->telefono !!}" disabled="" >
                                </div>                                
                                <div class="form-group ">
                                    <label>Sexo</label>
                                    <select name="sexo" class="form-control" disabled="">
                                        <option value="">ELIJA UNA OPCION</option>
                                        <option value="M" @if($alumno->sexo == "M") selected="" @endif >MASCULINO</option>
                                        <option value="F" @if($alumno->sexo == "F") selected="" @endif >FEMENINO</option>
                                    </select>
                                </div>
                                 <div class="form-group ">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{!! $alumno->email !!}" style="text-transform: lowercase;" onkeyup="javascript:this.value.toLowerCase();" disabled="" >
                                </div>
                                 <div class="form-group ">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control" value="{!! $alumno->direccion !!}" style="text-transform: lowercase;" onkeyup="javascript:this.value.toLowerCase();" disabled="" >
                                </div>
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select name="estadoal" class="form-control">
                                        <option value="" selected="">Elije una Opcion</option>
                                        <option value="Habilitado" @if($alumno->estadoal == "HABILITADO") selected="" @endif>HABILITADO</option>
                                        <option value="Desabilitado" @if($alumno->estadoal == "INHABILITADO") selected="" @endif>INHABILITADO</option>
                                    </select>
                                </div> 
                                 
                                <button type="button" class="btn btn-danger" onClick="location.href='/alumnos'">Volver</button>
                            </form>
                        </div>
@stop