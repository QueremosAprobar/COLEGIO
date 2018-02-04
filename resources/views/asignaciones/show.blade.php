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
                                    <label>NOMBRES</label>
                                    <input type="text" class="form-control" value="{!! $docente->nombre !!}" style="text-transform:uppercase;" onkeyup="javascript:this.value.toUpperCase();" disabled="" >
                                </div>
                                <div class="form-group ">
                                    <label>APELLIDOS</label>
                                        <input type="text" class="form-control" value="{!! $docente->apellido !!}" style="text-transform: uppercase;" onkeyup="javascript:this.value.toUpperCase();" disabled="" >
                                </div>

                                <div class="form-group ">
                                    <label>ESPECIALIDAD</label>
                                    <input type="text" class="form-control" value="{!! $docente->especialidad !!}" disabled="" >
                                </div>



                              @if ($asignacionp==NULL)
                                  <button type="button" class="btn btn-danger" onClick="location.href='/docentes'">Volver</button>
                                <button type="button" onclick ="location.href='/asignacionesp/{!!$docente->dnidocente!!}/edit' ">Completar datos</button>
                                <br><br>

                              @else
                                @if($asignacionp->nivel!='SECUNDARIA')
                                <div class="form-group ">
                                    <label>GRADO</label>
                                    <input type="text" class="form-control" value="{!! $asignacionp->grado !!} - {!!$asignacionp->seccion!!}" disabled="" >
                                </div>
                                @endif
                                  <button type="button" class="btn btn-danger" onClick="location.href='/docentes'">Volver</button>
                                 <br><br>
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
                                  $horasinicial= array('7','9','10.30','11');
                                  $horasprimariasecundariam= array('7','9','10.30','11');
                                  $horasprimariasecundariat= array('1','3','4.30','5');?>
                                  @if($asignacionp->turno=='MAÑANA')
                                    @if($asignacionp->nivel=='INICIAL')
                                      <?php foreach ($horasinicial as $hora): ?>
                                        <tr>
                                          <td class="bg-info text-white">{!!$hora!!}</td>
                                          @for ($i=1; $i < 6 ; $i++)
                                            @if($hora=='10.30')
                                            <td>RECESO</td>
                                            @else
                                            <td><input type="text"disabled=""
                                              @if($asignaciones!=NULL)
                                              <?php foreach ($asignaciones  as $asignacion): ?>

                                                @if($asignacion->dia=="Lunes") @if($i==1) @if($asignacion->hora==$hora )
                                                  value="{!!$asignacion->nombrecurso!!}"  @endif @endif
                                                @elseif($asignacion->dia=="Martes") @if( $i==2) @if( $asignacion->hora==$hora )
                                                  value="{!!$asignacion->nombrecurso!!}"  @endif @endif
                                                @elseif($asignacion->dia=="Miercoles") @if( $i==3) @if( $asignacion->hora==$hora )
                                                  value="{!!$asignacion->nombrecurso!!}"  @endif @endif
                                                @elseif($asignacion->dia=="Jueves") @if( $i==4 ) @if( $asignacion->hora==$hora )
                                                  value="{!!$asignacion->nombrecurso!!}"  @endif @endif
                                                @elseif($asignacion->dia=="Viernes") @if($i==5) @if( $asignacion->hora==$hora )
                                                  value="{!!$asignacion->nombrecurso!!}" @endif @endif
                                                @endif
                                              <?php endforeach; ?>
                                              @else
                                                value=""
                                              @endif
                                                <?php $data=$docente->dnidocente.'!'.$i.'!'.$hora.'!'.$asignacionp->grado; ?>
                                                ><a href="{!! action('AsignacionController@edit',$data) !!}" title="Editar">
                                                    <spam class="glyphicon glyphicon-pencil"></spam>
                                                </a></td>
                                            @endif
                                          @endfor

                                        </tr>
                                      <?php endforeach; ?>
                                      @elseif($asignacionp->nivel=='PRIMARIA') )
                                       <?php foreach ($horasprimariasecundariam as $hora): ?>
                                         <tr>
                                           <td class="bg-info text-white">{!!$hora!!}</td>
                                           @for ($i=1; $i < 6 ; $i++)
                                            @if($hora=='10.30')
                                            <td>RECESO</td>
                                            @else
                                             <td><input type="text"disabled=""
                                              @if($asignaciones!=NULL)
                                             <?php foreach ($asignaciones  as $asignacion): ?>
                                               @if($asignacion->dia=="Lunes") @if($i==1) @if($asignacion->hora==$hora )
                                                 value="{!!$asignacion->nombrecurso!!}"  @endif @endif
                                               @elseif($asignacion->dia=="Martes") @if( $i==2) @if( $asignacion->hora==$hora )
                                                 value="{!!$asignacion->nombrecurso!!}"  @endif @endif
                                               @elseif($asignacion->dia=="Miercoles") @if( $i==3) @if( $asignacion->hora==$hora )
                                                 value="{!!$asignacion->nombrecurso!!}"  @endif @endif
                                               @elseif($asignacion->dia=="Jueves") @if( $i==4 ) @if( $asignacion->hora==$hora )
                                                 value="{!!$asignacion->nombrecurso!!}"  @endif @endif
                                               @elseif($asignacion->dia=="Viernes") @if($i==5) @if( $asignacion->hora==$hora )
                                                 value="{!!$asignacion->nombrecurso!!}" @endif @endif
                                               @endif
                                             <?php endforeach; ?>
                                             @else
                                               value=""
                                             @endif
                                               <?php $data=$docente->dnidocente.'!'.$i.'!'.$hora.'!'.$asignacionp->grado;  ?>
                                               ><a href="{!! action('AsignacionController@edit',$data) !!}" title="Editar">
                                                   <spam class="glyphicon glyphicon-pencil"></spam>
                                               </a></td>
                                              @endif
                                           @endfor
                                         </tr>
                                       <?php endforeach; ?>
                                      @else
                                      <?php foreach ($horasprimariasecundariam as $hora): ?>
                                        <tr>
                                          <td class="bg-info text-white">{!!$hora!!}</td>
                                          @for ($i=1; $i < 6 ; $i++)
                                           @if($hora=='10.30')
                                           <td>RECESO</td>
                                           @else
                                            <td><input type="text"disabled=""
                                             @if($asignaciones!=NULL)
                                            <?php foreach ($asignaciones  as $asignacion): ?>
                                              @if($asignacion->dia=="Lunes") @if($i==1) @if($asignacion->hora==$hora )
                                                value="{!!$asignacion->nombrecurso!!} - {!!$asignacion->grado!!} - {!!$asignacion->seccion!!}"  @endif @endif
                                              @elseif($asignacion->dia=="Martes") @if( $i==2) @if( $asignacion->hora==$hora )
                                                value="{!!$asignacion->nombrecurso!!} - {!!$asignacion->grado!!} - {!!$asignacion->seccion!!}"  @endif @endif
                                              @elseif($asignacion->dia=="Miercoles") @if( $i==3) @if( $asignacion->hora==$hora )
                                                value="{!!$asignacion->nombrecurso!!} - {!!$asignacion->grado!!} - {!!$asignacion->seccion!!}"  @endif @endif
                                              @elseif($asignacion->dia=="Jueves") @if( $i==4 ) @if( $asignacion->hora==$hora )
                                                value="{!!$asignacion->nombrecurso!!} - {!!$asignacion->grado!!} - {!!$asignacion->seccion!!}"  @endif @endif
                                              @elseif($asignacion->dia=="Viernes") @if($i==5) @if( $asignacion->hora==$hora )
                                                value="{!!$asignacion->nombrecurso!!} - {!!$asignacion->grado!!} - {!!$asignacion->seccion!!}" @endif @endif
                                              @endif
                                            <?php endforeach; ?>
                                            @else
                                              value=""
                                            @endif
                                              <?php $data=$docente->dnidocente.'!'.$i.'!'.$hora.'!'.$asignacionp->grado;  ?>
                                              ><a href="{!! action('AsignacionController@edit',$data) !!}" title="Editar">
                                                <spam class="glyphicon glyphicon-pencil"></spam>
                                              </a></td>
                                           @endif
                                          @endfor
                                        </tr>
                                      <?php endforeach; ?>
                                      @endif

                                    @else
                                      @if($asignacionp->nivel=='PRIMARIA') )
                                       <?php foreach ($horasprimariasecundariat as $hora): ?>
                                         <tr>
                                           <td class="bg-info text-white">{!!$hora!!}</td>
                                           @for ($i=1; $i < 6 ; $i++)
                                            @if($hora=='4.30')
                                            <td>RECESO</td>
                                            @else
                                             <td><input type="text"disabled=""
                                              @if($asignaciones!=NULL)
                                             <?php foreach ($asignaciones  as $asignacion): ?>
                                               @if($asignacion->dia=="Lunes") @if($i==1) @if($asignacion->hora==$hora )
                                                 value="{!!$asignacion->nombrecurso!!}"  @endif @endif
                                               @elseif($asignacion->dia=="Martes") @if( $i==2) @if( $asignacion->hora==$hora )
                                                 value="{!!$asignacion->nombrecurso!!}"  @endif @endif
                                               @elseif($asignacion->dia=="Miercoles") @if( $i==3) @if( $asignacion->hora==$hora )
                                                 value="{!!$asignacion->nombrecurso!!}"  @endif @endif
                                               @elseif($asignacion->dia=="Jueves") @if( $i==4 ) @if( $asignacion->hora==$hora )
                                                 value="{!!$asignacion->nombrecurso!!}"  @endif @endif
                                               @elseif($asignacion->dia=="Viernes") @if($i==5) @if( $asignacion->hora==$hora )
                                                 value="{!!$asignacion->nombrecurso!!}" @endif @endif
                                               @endif
                                             <?php endforeach; ?>
                                             @else
                                               value=""
                                             @endif
                                                <?php $data=$docente->dnidocente.'!'.$i.'!'.$hora.'!'.$asignacionp->grado;  ?>
                                                  ><a href="{!! action('AsignacionController@edit',$data) !!}" title="Editar">
                                                 <spam class="glyphicon glyphicon-pencil"></spam>
                                               </a></td>
                                            @endif
                                           @endfor
                                         </tr>
                                       <?php endforeach; ?>
                                      @else
                                      <?php foreach ($horasprimariasecundariat as $hora): ?>
                                        <tr>
                                          <td class="bg-info text-white">{!!$hora!!}</td>
                                          @for ($i=1; $i < 6 ; $i++)
                                           @if($hora=='4.30')
                                           <td>RECESO</td>
                                           @else
                                            <td><input type="text"disabled=""
                                             @if($asignaciones!=NULL)
                                            <?php foreach ($asignaciones  as $asignacion): ?>
                                              @if($asignacion->dia=="Lunes") @if($i==1) @if($asignacion->hora==$hora )
                                                value="{!!$asignacion->nombrecurso!!} - {!!$asignacion->grado!!} - {!!$asignacion->seccion!!}"  @endif @endif
                                              @elseif($asignacion->dia=="Martes") @if( $i==2) @if( $asignacion->hora==$hora )
                                                value="{!!$asignacion->nombrecurso!!} - {!!$asignacion->grado!!} - {!!$asignacion->seccion!!}"  @endif @endif
                                              @elseif($asignacion->dia=="Miercoles") @if( $i==3) @if( $asignacion->hora==$hora )
                                                value="{!!$asignacion->nombrecurso!!} - {!!$asignacion->grado!!} - {!!$asignacion->seccion!!}"  @endif @endif
                                              @elseif($asignacion->dia=="Jueves") @if( $i==4 ) @if( $asignacion->hora==$hora )
                                                value="{!!$asignacion->nombrecurso!!} - {!!$asignacion->grado!!} - {!!$asignacion->seccion!!}"  @endif @endif
                                              @elseif($asignacion->dia=="Viernes") @if($i==5) @if( $asignacion->hora==$hora )
                                                value="{!!$asignacion->nombrecurso!!} - {!!$asignacion->grado!!} - {!!$asignacion->seccion!!}" @endif @endif
                                              @endif
                                            <?php endforeach; ?>
                                            @else
                                              value=""
                                            @endif
                                              <?php $data=$docente->dnidocente.'!'.$i.'!'.$hora.'!'.$asignacionp->grado;  ?>
                                              ><a href="{!! action('AsignacionController@edit',$data) !!}" title="Editar">
                                                  <spam class="glyphicon glyphicon-pencil"></spam>
                                              </a></td>
                                            @endif
                                          @endfor
                                        </tr>
                                      <?php endforeach; ?>
                                      @endif
                                    @endif
                                  </tbody>
                                </table>

                              @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@stop
