@extends('layout.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
        </div>
        {{--/.col-lg-12--}}
    </div>
    {{--/.row--}}
    <div class="row" >
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Ingrese los datos del Docente
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="/docentes" autocomplete="off">
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
                                    <label>DNI DOCENTE</label>
                                    <input type="text" class="form-control" name="dnidocente" placeholder="12345678" value="{{old('dnidocente')}}">
                                </div>


                                <div class="form-group">
                                    <label>CONTRASEÑA</label>
                                    <input type="password" class="form-control" name="contraseña" placeholder="***********" value="{{old('contraseña')}}">
                                </div>


                                <div class="form-group">
                                    <label>NOMBRES</label>
                                    <input type="text" class="form-control"  name="nombre" placeholder="" value="{{old('nombre')}}"onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>


                                <div class="form-group">
                                    <label>APELLIDOS</label>
                                    <input type="text" class="form-control" name="apellido" placeholder="" value="{{old('apellido')}}" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>


                                <div class="form-group">
                                    <label>DIRECCION</label>
                                    <input type="text" class="form-control" name="direccion" value="{{old('direccion')}}" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>


                                <div class="form-group">
                                    <label>TELEFONO</label>
                                    <input type="tel" class="form-control" name="telefono" placeholder="974000000" value="{{old('telefono')}}">
                                </div>

                                <div class="form-group">
                                    <label>NIVEL</label>
                                    {{--<input type="text" class="form-control" name="nivel" >--}}
                                    <select id="NIVEL" name="nivel" class="form-control" onchange="myfunction()">
                                        <option>INICIAL</option>
                                        <option>PRIMARIA</option>
                                        <option selected>SECUNDARIA</option>
                                    </select>
                                </div>


                                <div class="form-group" id="special">
                                        <label>ESPECIALIDAD</label>
                                        {{--<input type="text" class="form-control" name="especialidad">--}}
                                        <select id="ESPECIALIDAD"  name="especialidad"  class="form-control" >
                                            @foreach($cursos as $curso)
                                                {{--@if($curso->estado == "HABILITADO")--}}
                                                <option value="{{$curso->idcurso}}">{{$curso->nombre}}</option>
                                                {{--@endif--}}
                                            @endforeach
                                        </select>
                                </div>
                                {{--@foreach($docentes as $docente)--}}
                                    {{--@if($docente->nivel = "SECUNDARIA")--}}
                                        {{----}}
                                    {{--@else--}}
                                        {{----}}
                                    {{--@endif--}}

                                {{--@endforeach--}}

                                <div class="form-group">
                                    <label>EMAIL</label>
                                    <input type="email" class="form-control" name="email"  placeholder="nombre@example.com" value="{{old('email')}}">
                                </div>


                                <div class="form-group">
                                    <label>SEXO</label>
                                    {{--<input type="text" class="form-control" name="sexo" >--}}
                                    <select id="SEXO" name="sexo" class="form-control" >
                                        <option>MASCULINO</option>
                                        <option>FEMENINO</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>ESTADO</label>
                                    {{--<input type="text" class="form-control" name="estado" >--}}
                                    {{--           value="{{old('estado')}}"       --}}
                                    <select id="ESTADO" name="estado"  class="form-control">
                                        <option>HABILITADO</option>
                                        <option>INHABILITADO</option>
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="reset" class="btn btn-warning">Limpiar</button>
                                <button type="button" class="btn btn-danger" onclick="location.href='/docentes'">Volver</button>
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
        var n= document.getElementById("NIVEL").value;
        var m= document.getElementById("special");
        if (n=="SECUNDARIA")
        {
            m.style.display='block';
        }else{
            m.style.display='none';

        }
    }
</script>