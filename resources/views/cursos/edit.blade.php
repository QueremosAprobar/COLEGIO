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
                    Modificar Curso
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="/cursos/{{ $curso-> id}}" autocomplete="off">
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
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" value="{!! $curso->nombre !!}" name="nombre" >
                                </div>

                                <div class="form-group">
                                    <label>Nivel</label>
                                    <select id="nivel" name="nivel" class="form-control" onchange="myfunction()">
                                        <option  value="INICIAL"  @if($curso->nivel == "INICIAL") selected="" @endif>INICIAL</option>
                                        <option value="PRIMARIA" @if($curso->nivel == "PRIMARIA") selected="" @endif>PRIMARIA</option>
                                        <option value="SECUNDARIA" @if($curso->nivel == "SECUNDARIA") selected="" @endif>SECUNDARIA</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Grado</label><br>
                                    <input type="radio" id="1" name="grado" value="1" @if($curso->grado == "1") checked="" @endif>
                                    <label for="1">1er</label>
                                    <input type="radio" id="2" name="grado" value="2" @if($curso->grado == "2") checked="" @endif>
                                    <label for="2">2do</label>
                                    <input type="radio" id="3" name="grado" value="3" @if($curso->grado == "3") checked="" @endif>
                                    <label for="3">3er</label>
                                    <input type="radio" id="4" name="grado" value="4" @if($curso->grado == "4") checked="" @endif>
                                    <label for="4">4to</label>
                                    <input type="radio" id="5" name="grado" value="5" @if($curso->grado == "5") checked="" @endif>
                                    <label for="5">5to</label>
                                    <input type="radio" id="6" name="grado" value="6" @if($curso->grado == "6") checked="" @endif>
                                    <label for="6">6to</label>
                                </div>

                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="reset" class="btn btn-warning">Limpiar</button>
                                <button type="button" class="btn btn-danger" onClick="location.href='/cursos'">Volver</button>
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