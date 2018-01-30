
@extends('layout.layout')

@section('Mantenimiento')
<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading" style="height:100px;">
      <i class="fa fa-book fa-fw"></i>
      <a1 class="titulo"><font size=5>BIENVENIDO AL MANTENIMIENTO DE DOCENTES</font><br>
      <div class="pull-right">
        <div class="btn-group">
          <button type="button"  class="btn btn-primary btn-sm"
            onClick="location.href='/docentes/create'">NUEVO DOCENTE</button>
            {{--Aqui iba el Inicio--}}
        </div>
      </div>
    </div>
    <div class="panel-body">
      <div>
        @yield('contenido')
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
  @yield('js')
@endsection

@section('js_scripts')
  @yield('js_scripts')
@endsection
