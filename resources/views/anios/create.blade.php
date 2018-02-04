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
                    Ingrese la información del año
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="/anios" autocomplete="off">
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            x
                                        </button>
                                        {{ $error }}
                                    </div>
                                @endforeach
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                                <div class="form-group">
                                    <label>ID AÑO</label>
                                    <input type="text" class="form-control" name="idanio" placeholder="2018">
                                </div>
                                
                                <div class="form-group">
                                    <label>Fecha de Inicio</label>
                                    <input type="date" class="form-control" name="fechaini">
                                </div>

                                <div class="form-group">
                                    <label>Fecha de Final</label>
                                    <input type="date" class="form-control" name="fechafin">
                                </div>

                                <div class="form-group">
                                    <label>ESTADO</label>
                                    {{--<input type="text" class="form-control" name="estado" >--}}
                                    {{--           value="{{old('estado')}}"       --}}
                                    <select id="ESTADO" name="estado"  class="form-control" >
                                        <option>HABILITADO</option>
                                        <option>INHABILITADO</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="reset" class="btn btn-warning">Limpiar</button>
                                <button type="button" class="btn btn-danger" onclick="location.href='/anios'">Volver</button>
                            </form>
                        </div>
                        @stop
                    </div>
                </div>
            </div>
        </div>
    </div>