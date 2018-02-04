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
                    Ingrese los datos del Curso
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="/cursos" autocomplete="off">
                               @if (count($errors)>0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>{{ $error}}</li>
                                        @endforeach
                                    </ul> 
                                </div>
                                @endif
                                   <?php /**/ $a=count($cursos)+1 /**/ ?>

                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                   <div class="form-group">
                                       <label>ID Curso</label>
                                       <input type="text" class="form-control" name="idcurso" placeholder="" value={{ $a }} >
                                   </div>
                                
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                                </div>
                                <div class="form-group">
                                    <label>Nivel</label>
                                    <select id="nivel" name="nivel" class="form-control" onchange="myfunction()">
                                        <option  value="INICIAL">INICIAL</option>
                                        <option value="PRIMARIA" selected>PRIMARIA</option>
                                        <option value="SECUNDARIA">SECUNDARIA</option>
                                    </select>
                                </div>
                                <div class="form-group">                                    
                                    <label>Grado</label><br>
                                    <input type="radio" id="1" name="grado" value="1">
                                    <label for="1">1er</label>
                                    <input type="radio" id="2" name="grado" value="2">
                                    <label for="2">2do</label>
                                    <input type="radio" id="3" name="grado" value="3">
                                    <label for="3">3er</label>
                                    <input type="radio" id="4" name="grado" value="4">
                                    <label for="4">4to</label>
                                    <input type="radio" id="5" name="grado" value="5">
                                    <label for="5">5to</label>
                                    <input type="radio" id="6" name="grado" value="6">
                                    <label for="6">6to</label>
                                </div>

                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="reset" class="btn btn-warning">Limpiar</button>
                                <button type="button" class="btn btn-danger" onclick="location.href='/cursos'">Volver</button>
                            </form>
                        </div>
                        @stop
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myfunction() {
            var n= document.getElementById("nivel").value;
            if (n=="PRIMARIA")
            {
                document.getElementById("1").disabled=false;
                document.getElementById("2").disabled=false;
                document.getElementById("3").disabled=false;
                document.getElementById("4").disabled=false;
                document.getElementById("5").disabled=false;
                document.getElementById("6").disabled=false;
            }
            if (n=="SECUNDARIA")
            {
                document.getElementById("1").disabled=false;
                document.getElementById("2").disabled=false;
                document.getElementById("3").disabled=false;
                document.getElementById("4").disabled=false;
                document.getElementById("5").disabled=false;
                document.getElementById("6").disabled=true;
            }
            if (n=="INICIAL")
            {
                document.getElementById("1").disabled=false;
                document.getElementById("2").disabled=false;
                document.getElementById("3").disabled=false;
                document.getElementById("4").disabled=true;
                document.getElementById("5").disabled=true;
                document.getElementById("6").disabled=true;
            }
        }
    </script>