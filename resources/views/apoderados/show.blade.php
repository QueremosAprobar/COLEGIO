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
                    Datos del Apoderado
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" >
                                <div class="form-group ">
                                    <label>DNI</label>
                                    <input type="text" class="form-control" value="{!! $apoderado->dniapoderado !!}"  >
                                </div>  
                                <div class="form-group ">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" value="{!! $apoderado->nombre !!}" style="text-transform:uppercase;" onkeyup="javascript:this.value.toUpperCase();" disabled="" >
                                </div>  
                                <div class="form-group ">
                                    <label>Apellido</label>
                                    <input type="text" class="form-control" value="{!! $apoderado->apellido !!}" style="text-transform:uppercase;" onkeyup="javascript:this.value.toUpperCase();" disabled="" >
                                </div>  
                                <div class="form-group ">
                                    <label>Sexo</label>
                                    <input type="text" class="form-control" value="{!! $apoderado->sexo !!}" style="text-transform:uppercase;" onkeyup="javascript:this.value.toUpperCase();" disabled="" >
                                </div>  
                                <div class="form-group ">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control" value="{!! $apoderado->direccion !!}" style="text-transform:uppercase;" onkeyup="javascript:this.value.toUpperCase();" disabled="" >
                                </div>  
                                <div class="form-group ">
                                    <label>Estado</label>
                                    <input type="text" class="form-control" value="{!! $apoderado->estadocv !!}" style="text-transform: lowercase;" onkeyup="javascript:this.value.toLowerCase();" disabled="" >
                                </div>                              
                                <div class="form-group ">
                                    <label>Telefono</label>
                                    <input type="text" class="form-control" value="{!! $apoderado->telefono !!}" style="text-transform:uppercase;" onkeyup="javascript:this.value.toUpperCase();" disabled="" >
                                </div>                               
                                <button type="button" class="btn btn-danger" onClick="location.href='/apoderados'">Volver</button>
                            </form>
                        </div>
@stop