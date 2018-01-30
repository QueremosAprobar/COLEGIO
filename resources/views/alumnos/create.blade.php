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
                    Ingrese los datos del Alumno
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="/alumnos" autocomplete="off">
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
                                    <label>DNI</label>
                                    <input type="text" class="form-control" placeholder="12345678" name="dnialumno">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" name="contraseña" placeholder="***********" value="{{old('contraseña')}}">
                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" name="nombre" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control" name="apellido" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                 <div class="form-group">
                                    <label>Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" name="fechanac">
                                </div>

                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="text" class="form-control" placeholder="" name="telefono">
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
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="nombre@example.com" name="email" style="text-transform: lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();">
                                </div>
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control" name="direccion" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group">
                                    <label>Distrito</label>
                                    <input type="text" class="form-control" name="distrito" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group">
                                    <label>Provincia</label>
                                    <input type="text" class="form-control" name="provincia" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group">
                                    <label>Departamento</label>
                                    <input type="text" class="form-control" name="departamento" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>

                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="reset" class="btn btn-warning">Limpiar</button>
                                <button type="button" class="btn btn-danger" onclick="location.href='/alumnos'">Volver</button>
                            </form>
                        </div>
                        @stop
                    </div>
                </div>
            </div>
        </div>
    </div>
