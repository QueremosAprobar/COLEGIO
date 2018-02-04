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
                    DATOS DEL ALUMNO
                </div></label>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form"class="form-vertical" action="" >

                              <?php $opcion=true ?>
                              <?php foreach ($tabaalumno as $tabalumno): ?>
                                <?php if($opcion):$opcion=false ?>

                                <div class="form-group ">
                                    <label>Nombres</label>
                                    <input type="text" class="form-control" value="{!! $tabalumno->nombre !!}" disabled="" >
                                </div>
                                <div class="form-group ">
                                    <label>APELLIDOS</label>
                                        <input type="text" class="form-control" value="{!! $tabalumno->apellido  !!}" style="text-transform: uppercase;" onkeyup="javascript:this.value.toUpperCase();" disabled="" >
                                </div>
                                <div class="form-group ">
                                    <label>Grado</label>
                                    <input type="text" class="form-control" value="{!!  $tabalumno->grado !!}" style="text-transform:uppercase;" onkeyup="javascript:this.value.toUpperCase();" disabled="" >
                                </div>

                                <div class="center">
                                    <ul class="nav nav-pills">
                                        <li>
                                            <a href="{!! action('ViewAlumnoController@show', $tabalumno->dnialumno) !!}" title="Ver">
                                                <spam class="glyphicon glyphicon-search">Ver Notas</spam>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <br><br>
                                <?php endif ?>
                                <?php endforeach; ?>

                                <table class="table table-bordered table-responsive table-striped">
                                  <thead class="bg-info text-white">
                                    <th>HORA</th>
                                    <th>Lunes</th>
                                    <th>Martes</th>
                                    <th>Miercoles</th>
                                    <th>Jueves</th>
                                    <th>Viernes</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $horamañana= array('7','9','11','1');
                                    $horatarde= array('14.00-15.30','15.30-17.00','17.00-17.30','17.30-19.00');?>
                                    <?php $turno ?>
                                    <?php $nivel ?>
                                    <?php foreach ($cursohorario as $cur): ?>
                                      <?php $turno=$cur->turno;
                                      $nivel=$cur->nivel;
                                      break;?>
                                    <?php endforeach ?>

                                    @if($turno=="MAÑANA" and $nivel!="INICIAL")
                                     <?php foreach ($horamañana as $mañana):?>
                                       <tr>
                                         <td> {!! $mañana !!}</td>
                                         <?php for ($i=1; $i < 6; $i++):?>
                                           <td>
                                             @if($cursohorario!=NULL)
                                                <?php foreach ($cursohorario as $curso):?>
                                                  @if($curso->dia=='LUNES') @if($i==1) @if($curso->hora==$mañana)
                                                    {!! $curso->nombre !!} @endif @endif
                                                  @elseif($curso->dia=='MARTES') @if($i==2) @if($curso->hora==$mañana)
                                                    {!! $curso->nombre !!}  @endif @endif
                                                  @elseif($curso->dia=='MIERCOLES') @if($i==3) @if($curso->hora==$mañana)
                                                    {!! $curso->nombre !!} @endif @endif
                                                  @elseif($curso->dia=='JUEVES') @if($i==4) @if($curso->hora==$mañana)
                                                    {!! $curso->nombre !!} @endif @endif
                                                  @elseif($curso->dia=='VIERNES') @if($i==5) @if($curso->hora==$mañana)
                                                    {!! $curso->nombre !!} @endif @endif
                                                  @endif
                                                <?php endforeach ?>
                                              @endif
                                           </td>
                                         <?php endfor ?>
                                       </tr>
                                     <?php endforeach ?>
                                     @elseif($turno=="TARDE" and $nivel!="INICIAL")
                                     <?php foreach ($horatarde as $mañana):?>
                                       <tr>
                                         <td> {!! $mañana !!}</td>
                                         <?php for ($i=1; $i < 6; $i++):?>
                                           <td>
                                             @if($cursohorario!=NULL)
                                                <?php foreach ($cursohorario as $curso):?>
                                                  @if($curso->dia=='LUNES') @if($i==1) @if($curso->hora==$mañana)
                                                    {!! $curso->nombre !!} @endif @endif
                                                  @elseif($curso->dia=='MARTES') @if($i==2) @if($curso->hora==$mañana)
                                                    {!! $curso->nombre !!}  @endif @endif
                                                  @elseif($curso->dia=='MIERCOLES') @if($i==3) @if($curso->hora==$mañana)
                                                    {!! $curso->nombre !!} @endif @endif
                                                  @elseif($curso->dia=='JUEVES') @if($i==4) @if($curso->hora==$mañana)
                                                    {!! $curso->nombre !!} @endif @endif
                                                  @elseif($curso->dia=='VIERNES') @if($i==5) @if($curso->hora==$mañana)
                                                    {!! $curso->nombre !!} @endif @endif
                                                  @endif
                                                <?php endforeach ?>
                                              @endif
                                           </td>
                                         <?php endfor ?>
                                       </tr>
                                     <?php endforeach ?>
                                     @elseif($nivel=="INICIAL")
                                     <?php foreach ($horamañana as $mañana):?>
                                       <tr>
                                         <td> {!! $mañana !!}</td>
                                         <?php for ($i=1; $i < 5; $i++):?>
                                           <td>
                                             @if($cursohorario!=NULL)
                                                <?php foreach ($cursohorario as $curso):?>
                                                  @if($curso->dia=='LUNES') @if($i==1) @if($curso->hora==$mañana)
                                                    {!! $curso->nombre !!} @endif @endif
                                                  @elseif($curso->dia=='MARTES') @if($i==2) @if($curso->hora==$mañana)
                                                    {!! $curso->nombre !!}  @endif @endif
                                                  @elseif($curso->dia=='MIERCOLES') @if($i==3) @if($curso->hora==$mañana)
                                                    {!! $curso->nombre !!} @endif @endif
                                                  @elseif($curso->dia=='JUEVES') @if($i==4) @if($curso->hora==$mañana)
                                                    {!! $curso->nombre !!} @endif @endif
                                                  @elseif($curso->dia=='VIERNES') @if($i==5) @if($curso->hora==$mañana)
                                                    {!! $curso->nombre !!} @endif @endif
                                                  @endif
                                                <?php endforeach ?>
                                              @endif
                                           </td>
                                         <?php endfor ?>
                                       </tr>
                                     <?php endforeach ?>
                                     @endif
                                  </tbody>
                                </table>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

@stop
