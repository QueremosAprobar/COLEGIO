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
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                                </div>
                                <div class="form-group">
                                    <label>Nivel</label>
                                    <input type="text" class="form-control" name="nivel" placeholder="Nivel">
                                </div>
                                <div class="form-group">
                                    <label>Grado</label>
                                    <input type="text" class="form-control" name="grado">
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
