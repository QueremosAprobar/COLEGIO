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
                    Datos del Docente
                </div></label>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" >

                                <div class="form-group ">
                                    <label>DNI DOCENTE</label>
                                    <input type="text" class="form-control" value="{!! $docente->dnidocente !!}" disabled="" >
                                </div>


                                <div class="form-group ">
                                    <label>CONTRASEÑA</label>
                                    <input type="password" class="form-control" value="{!! $docente->contraseña !!}" disabled="" >
                                </div>


                                <div class="form-group ">
                                    <label>NOMBRES</label>
                                    <input type="text" class="form-control" value="{!! $docente->nombre !!}" style="text-transform:uppercase;" onkeyup="javascript:this.value.toUpperCase();" disabled="" >
                                </div>
                                <div class="form-group ">
                                    <label>APELLIDOS</label>
                                        <input type="text" class="form-control" value="{!! $docente->apellido !!}" style="text-transform: uppercase;" onkeyup="javascript:this.value.toUpperCase();" disabled="" >
                                </div>


                                <div class="form-group ">
                                    <label>DIRECCION</label>
                                    <input type="text" class="form-control" value="{!! $docente->direccion !!}" disabled="" >
                                </div>


                                <div class="form-group ">
                                    <label>TELEFONO</label>
                                    <input type="tel" class="form-control" value="{!! $docente->telefono !!}" disabled="" >
                                </div>

                                <div class="form-group ">
                                    <label>NIVEL</label>
                                    <input type="text" class="form-control" value="{!! $docente->nivel !!}" disabled="" >
                                </div>


                                @if($docente->nivel=="SECUNDARIA")
                                    <div class="form-group ">
                                        <label>ESPECIALIDAD</label>
                                        <input type="text" class="form-control" value="{!! $docente->especialidad !!}" disabled="" >
                                    </div>
                                @endif


                                <div class="form-group ">
                                    <label>EMAIL</label>
                                    <input type="email" class="form-control" value="{!! $docente->email !!}" style="text-transform: lowercase;" onkeyup="javascript:this.value.toLowerCase();" disabled="" >
                                </div>



                                <div class="form-group ">
                                    <label>SEXO</label>
                                    <input type="text" class="form-control" value="{!! $docente->sexo !!}" disabled="" >
                                </div>


                                <div class="form-group ">
                                    <label>ESTADO</label>
                                    <input type="text" class="form-control" value="{!! $docente->estado !!}" disabled="" >
                                </div>


                                <button type="button" class="btn btn-danger" onClick="location.href='/docentes'">Volver</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@stop
