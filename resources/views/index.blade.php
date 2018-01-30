<!DOCTYPE html>
<html>
<head>
<title>C.E.P.InmaculadaConcepcion</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=devi-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Infirmary Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
<link href={{ URL::asset("css/font-awesome.min.css") }} rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
		window.Laravel = <?php echo json_encode([
				'csrfToken' => csrf_token(),
		]); ?>
</script>
<!-- //js -->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>

	<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
	<!-- start-smoth-scrolling -->

<!--start-date-piker-->
	<script src="js/jquery-ui.js"></script>
		<script>
			$(function() {
				$( "#datepicker,#datepicker1" ).datepicker();
			});
		</script>
<!--/End-date-piker-->
	<script src="js/responsiveslides.min.js"></script>
			<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
</head>

<body>
<!-- header -->
<div class="header wow zoomIn">
	<div class="container">
		<div class="header_left" data-wow-duration="2s" data-wow-delay="0.5s">
			<ul>
				<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>(084) 000000</li>
				<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>inmaculada_concepcion@google.edu.pe</li>
			</ul>
		</div>
		<div class="header_right">
      @yield('opcion')
      			<div class="login">
				<ul>
					@if (Auth::guest())
							<li><a href="#" data-toggle="modal" data-target="#myModal4"><span class="glyphicon glyphicon-user" 	aria-hidden="true"></span>Iniciar sesión</a></li>
					@else
							<li><a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
												{{Auth::user()->dni}}
										</a></li>
							<li><a href="{{ url('/logout') }}"
											onclick="event.preventDefault();
															 document.getElementById('logout-form').submit();">
											Cerrar Sesión
									</a>
									<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
									</form>
							</li>
							@if(Auth::user()->tipo=='Admi')
								<li><a href="pacientes"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Configuracion</a></li>
							@endif
					@endif
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- //header2 -->
@if(!Auth::guest())
	@if(Auth::user()->tipo=='Docente')
		<div class="header wow zoomIn">
			<div class="container">
				<div class="header_right">
					<div class="login">
						<ul>
							<li><a id="btn_Mostrar_Modificar_Datos_Medico">Perfil</a></li>
							<li><a href="/#">Horarios</a></li>
							<li><a href="/#">Subir Notas</a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	@endif
	@if(Auth::user()->tipo=='Alumno')
	<div class="header wow zoomIn">
			<div class="container">
				<div class="header_right">
					<div class="login">
						<ul>
						<li><a href="/#"id="Cargar_Datos"> Perfil</a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	@endif
	@if(Auth::user()->tipo=='Admi')
		@include('Admi.sub_menu')
	@endif
@endif
<!-- //header -->
<div class="header-bottom ">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				  	<h4>menu</h4>
					<span class="sr-only">Toggle navigation</span>
				  </button>
					<div class="logo grid">
						<div class="grid__item color-2">
							<div class="row">
							  <div class="col-xs-4 col-md-2"><img src="../images/logo1.jpg" alt=""></div>
								<div class="col-xs-8 col-md-10"><h1><a>C.E.P. INMACULADA CONCEPCION</a></h1>
							 </div>
							</div>
						</div>
					</div>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--horatio">
						<ul class="nav navbar-nav menu__list">
							<li class="menu__item"><a href="inicio" class="menu__link">Inicio</a></li>
							<li class="menu__item"><a href="about" class="menu__link">Sobre nosotros</a></li>
							<li class="menu__item"><a href="contact" class="menu__link">Contáctanos</a></li>
							<li class="menu__item"><a href="layout" class="menu__link">LAYOUT</a></li>
						</ul>
					</nav>
				</div>
			</nav>
		</div>
	</div>

<!-- banner -->
<div class="banner">
				<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						 // Slideshow 4
						$("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 200,

							namespace: "callbacks",
							before: function () {
						$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
							}
							});
						});
				</script>
        @yield('benners')
		<div class="clearfix"></div>
</div>
<!-- //banner -->
<div>
@yield('mas')
</div>
<!-- content -->
<div class="content">
  <div class="container">
  	@yield('info')
  </div>
</div>
<!-- //content -->
<!-- services -->
<div class="services">
				<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						 // Slideshow 4
						$("#slider4").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,

							namespace: "callbacks",
							before: function () {
						$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
							}
							});
						});
				</script>
        @yield('servicios')
</div>
<!-- //services -->
<!-- team -->
<div>
	@yield('team')
</div>
<!-- team -->
<!-- contact -->
<div class="contact">
	<div class="container">

		<div class="col-md-6 contact-right wow fadeIn animated animated" data-wow-delay="0.1s" data-wow-duration="2s">
			<bl>Información</bl>
			<div class="strip"></div>
			<p class="">El C.E.P. Inmaculada Concepcion cusco esta al servicio de la problacion ofreciendo a los alumnos una educacion en valores y respeto.</p>
			<div class="strip"></div>
		</div>
		<div class="col-md-6 contact-left wow fadeIn animated animated" data-wow-delay="0.1s" data-wow-duration="2s">
			<bl>Contáctanos</bl>
			<div class="strip"></div>
			<ul class="con-icons">
				<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>(084) 000000</li>
				<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>inmaculada_concepcion@google.com.pe</li>
			</ul>
			<ul class="fb_icons">
				<li class="hvr-rectangle-out"><a class="fb" ></a></li>
				<li class="hvr-rectangle-out"><a class="twit"></a></li>
				<li class="hvr-rectangle-out"><a class="goog"></a></li>
				<li class="hvr-rectangle-out"><a class="pin" ></a></li>
				<li class="hvr-rectangle-out"><a class="drib"></a></li>
			</ul>
			<div class="strip"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //contact -->
<!-- login -->
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" >
				<div class="modal-dialog" role="document">
					<div class="col-md-12 col-md-offset-2">
						<div class="panel panel-default">
							<div class="panel-heading" style="color: white;background-color: #2a88bd;border-color: #2a88bd">Iniciar Sesion</div>
							<div class="panel-body">
								<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
									{{ csrf_field() }}

									{{--Campo DNI--}}
									<div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
										<label for="email" class="col-md-4 control-label">DNI</label>

										<div class="col-md-6">
											<input id="dni" type="text" class="form-control" name="dni" placeholder="Ingrese DNI">

											@if ($errors->has('dni'))
												<span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
											@endif
										</div>
									</div>

									{{--Campo Contraseña--}}
									<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
										<label for="password" class="col-md-4 control-label">CONTRASEÑA</label>

										<div class="col-md-6">
											<input id="password" type="password" class="form-control" name="password" placeholder="Ingrese Contraseña" required>

											@if ($errors->has('password'))
												<span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
											@endif
										</div>
									</div>
									<input id="tipo" type="text" name="tipo" placeholder="tipo" hidden>

									<div class="form-group">
										<div class="col-md-6 col-md-offset-4">
											<button type="submit" class="btn btn-primary">
												Iniciar Sesion
											</button>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>

				</div>
			</div>
<!-- MODAL PARA EDITAR DATOS PACIENTE -->


<!-- MODAL PARA EDITAR DATOS medico-->
@if(!Auth::guest())
	@if(Auth::user()->tipo=='Medico')

<div class="modal fade" id="Mo_Datos_Medico" tabindex="-1" role="dialog" style="top:-70px">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body modal-spa">
				<div class="login-grids">
					<div class="login-right1">
						<div class="modal-body" style="background-color:#EFF8FB">
						    <form method="POST" action="/pacientes/{{ $Datos_Medico->dni }}" autocomplete="off">
						          {{csrf_field()}}
						          {{method_field('PUT')}}

						        <fieldset>
											<div class="text-center"><h2 align="center">Editar Datos Personales</h2></div></br>

								<div class="input-group col-md-12 col-xs-12">
											  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-list-alt bigicon"></i></span>
											 <span  class="col-md-6 col-xs-10 has-float-label">
												      <div class="group-control">
																<label>DNI</label>
											 				<input id="dni_medico" name="dni_medico" placeholder="DNI" class="form-control" required value="{{$Datos_Medico->dni}}" readonly="readonly">
													</div>
									</div>


									<div class="input-group col-md-12 col-xs-12">
														<span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
														<span  class="col-md-6 col-xs-10 has-float-label">
														<div class="group-control">
															<label>Nombres</label>
															<input id="Nombres_medico" name="nombres_medico" placeholder="Nombres" class="form-control" required value="{{$Datos_Medico->nombres}}" readonly="readonly">
													</div>
										</div>
										<div class="input-group col-md-12 col-xs-12">
															<span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
															<span  class="col-md-6 col-xs-10 has-float-label">
															<div class="group-control">
																	<label for="Apellidos">Apellidos</label>
															<input id="Apellidos_medico" name="apellidos_medico" placeholder="Apellidos" class="form-control" required value="{{$Datos_Medico->apellidos}}" readonly="readonly">
													</div>
										</div>
											<div class="input-group col-md-12 col-xs-12">
													<span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
													<span  class="col-md-6 col-xs-10 has-float-label">
														<div class="group-control">
															<label>Fecha de Nacimiento</label>
															<input id="Fecha_Nacimiento_medico" type ="date" name="fecha_nacimiento_medico" placeholder="Fecha de Nacimiento" class="form-control" required value="{{$Datos_Medico->fecha_nacimiento}}" readonly="readonly">
												</div>
										</div>

										<div class="input-group col-md-12 col-xs-12">
											<span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-female bigicon"></i></span>
												<span  class="col-md-6 col-xs-10 has-float-label">
													<div class="group-control">
														<label>Sexo</label>
														<select class="form-control" id="Sexo_medico" name="sexo_medico" >
															<option>MASCULINO</option>
															<option>FEMENINO</option>
															</select>
												</div>
									</div>
									<div class="input-group col-md-12 col-xs-12">
											<span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-phone bigicon"></i></span>
											<span  class="col-md-6 col-xs-10 has-float-label">
												<div class="group-control">
													<label for="Telefono">Teléfono</label>
														<input id="Telefono_medico" name="telefono_medico" placeholder="Teléfono" class="form-control" required value="{{$Datos_Medico->telefono}}">

												</div>
									</div>
									<div class="input-group col-md-12 col-xs-12">
										<span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-envelope bigicon"></i></span>
										<span  class="col-md-6 col-xs-10 has-float-label">
											<div class="group-control">
												<label>E-Mail</label>
															<input id="E_mail_medico" name="correo_medico" placeholder="E-Mail" class="form-control" required value="{{$Datos_Medico->correo}}">
													</div>
										</div>
										<div class="input-group col-md-12 col-xs-12">
											<span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-home bigicon"></i></span>
											<span  class="col-md-6 col-xs-10 has-float-label">
												<div class="group-control">
													<label>Dirección</label>
															<input id="Direccion_medico" name="direccion_medico" placeholder="Dirección" class="form-control" required value="{{$Datos_Medico->direccion}}">
													</div>
										</div>

						                <div class="form-group">
						                      <div class="ccol-md-12 text-center">
						                          <input id="btn_Modificar_Datos_Medico" type="button" style="width:200px" class="btn btn-primary" align="center" class="form-control" value="Guardar Cambios">
						                      </div>
						                </div>
						            </div>

						            </fieldset>
						       </form>

							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
@endif

@if(!Auth::guest())
	@if(Auth::user()->tipo=='Paciente')

<div class="modal fade" id="Mo_Datos_Paciente" tabindex="-1" role="dialog" style="top:-70px">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body modal-spa">
				<div class="login-grids">
					<div class="login-right1">
						<div class="modal-body" style="background-color:#EFF8FB">
						    <form method="POST" action="/pacientes/{{ $Datos_Paciente->dni }}" autocomplete="off">
						          {{csrf_field()}}
						          {{method_field('PUT')}}

						        <fieldset>
											<div class="text-center"><h2 align="center">Editar Datos Personales</h2></div></br>

										 										<div class="input-group col-md-12 col-xs-12">
										 													  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-list-alt bigicon"></i></span>
										 													 <span  class="col-md-6 col-xs-10 has-float-label">
										 														      <div class="group-control">
										 																		<label>DNI</label>
										 													 				<input id="dni" name="dni" placeholder="DNI" class="form-control" required value="{{$Datos_Paciente->dni}}" readonly="readonly">
										     														</div>
										 											</div>


										 											<div class="input-group col-md-12 col-xs-12">
										 																<span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
										 																<span  class="col-md-6 col-xs-10 has-float-label">
										 																<div class="group-control">
										 																	<label>Nombres</label>
										 																	<input id="Nombres" name="nombres" placeholder="Nombres" class="form-control" required value="{{$Datos_Paciente->nombres}}" readonly="readonly">
										 															</div>
										 												</div>
										 												<div class="input-group col-md-12 col-xs-12">
										 																	<span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
										 																	<span  class="col-md-6 col-xs-10 has-float-label">
										 																	<div class="group-control">
										 																			<label for="Apellidos">Apellidos</label>
										 																	<input id="Apellidos" name="apellidos" placeholder="Apellidos" class="form-control" required value="{{$Datos_Paciente->apellidos}}" readonly="readonly">
										 															</div>
										 												</div>
										 													<div class="input-group col-md-12 col-xs-12">
										 															<span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
										 															<span  class="col-md-6 col-xs-10 has-float-label">
										 																<div class="group-control">
										 																	<label>Fecha de Nacimiento</label>
										 																	<input id="Fecha_Nacimiento" type ="date" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" class="form-control" required value="{{$Datos_Paciente->fecha_nacimiento}}" readonly="readonly">
										 														</div>
										 												</div>

										 												<div class="input-group col-md-12 col-xs-12">
										 													<span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-female bigicon"></i></span>
										 														<span  class="col-md-6 col-xs-10 has-float-label">
										 															<div class="group-control">
										 																<label>Sexo</label>
										 																<select class="form-control" id="Sexo" name="sexo" >
										 																	<option>MASCULINO</option>
										 																	<option>FEMENINO</option>
										 																	</select>
										 														</div>
										 											</div>
										 											<div class="input-group col-md-12 col-xs-12">
										 													<span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-phone bigicon"></i></span>
										 													<span  class="col-md-6 col-xs-10 has-float-label">
										 														<div class="group-control">
										 															<label for="Telefono">Teléfono</label>
										 																<input id="Telefono" name="telefono" placeholder="Teléfono" class="form-control" required value="{{$Datos_Paciente->telefono}}">

										 														</div>
										 											</div>
										 											<div class="input-group col-md-12 col-xs-12">
										 												<span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-envelope bigicon"></i></span>
										 												<span  class="col-md-6 col-xs-10 has-float-label">
										 													<div class="group-control">
										 														<label>E-Mail</label>
										 																	<input id="E_mail" name="correo" placeholder="E-Mail" class="form-control" required value="{{$Datos_Paciente->correo}}">
										 															</div>
										 												</div>
										 												<div class="input-group col-md-12 col-xs-12">
										 													<span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-home bigicon"></i></span>
										 													<span  class="col-md-6 col-xs-10 has-float-label">
										 														<div class="group-control">
										 															<label>Dirección</label>
										 																	<input id="Direccion" name="direccion" placeholder="Dirección" class="form-control" required value="{{$Datos_Paciente->direccion}}">
										 															</div>
										 												</div>

						                <div class="form-group">
						                      <div class="ccol-md-12 text-center">
						                          <input id="btn_Modificar_Datos_Paciente" type="button" style="width:200px" class="btn btn-primary" align="center" class="form-control" value="Guardar Cambios">
						                      </div>
						                </div>
						            </div>

						            </fieldset>
						       </form>

							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
@endif


@if(!Auth::guest())
@if(Auth::user()->tipo=='Paciente')

<div class="modal fade" id="Mo_Especialidades" tabindex="-1" role="dialog" >
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body modal-spa">
				<div class="login-grids">
					<div class="login-right1">
						<div class="modal-body" align="center">
								<h2 align="center" >Reservar Cita</h2>

								<select id="Especialidad_Cita" name="Especialidad_Cita" class="form-control frm-field required sect">
									@foreach($especialidades as $especialidad)
										<option value = "{{$especialidad->codigo}}">{{$especialidad->nombre}}</option>
									@endforeach
								</select></br>

								<button id="btn_Mostrar_Horario" style="width:350px"  type="button" class="btn btn-primary">Siguiente</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
@endif


@if(!Auth::guest())
@if(Auth::user()->tipo=='Paciente')
<div class="modal fade" id="Mo_Horario" role="dialog" >
	<div class="modal-dialog">
		<div style="width: 1250px;left: -70%;" class="modal-content">
			<div class="modal-header" align="center">
				<label><h2 id="Titulo_Horario" text-align="center"></h2></label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="modal-body" id="Mo_Body_Horario">
				</div>
			</div>
		</div>
	</div>
</div>

                           <!-- Modal -->
<div class="modal fade" id="Mo_Registrar_Cita" role="dialog">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" align="center">Registrar Cita</h4>
    </div>
      <form role="form" method="get" action="/reservas_Almacenar" autocomplete="off">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="modal-body">

          <div id="Datos_Reserva">

          </div>
          <input name="Id_Paciente" id="Id_Paciente" type="hidden" value="{{Auth::user()->dni}}">
        </div>

        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Confirmar">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
  </div>

</div>
</div>
@endif

<style>
.Hora_Cita_Libre:hover{
	background-color: blue;
	text-align: center;
	cursor: pointer;
}

.Hora_Cita_Ocupado:hover{
	background-color: red;
	text-align: center;
	cursor:not-allowed;
}

</style>
@endif

@if(!Auth::guest())
@if(Auth::user()->tipo=='Paciente')
<div class="modal fade" id="Mo_ListarCita" tabindex="-1" role="dialog" >
	<div class="modal-dialog" role="document">
		<div style="width: 1000px;left: -50%;" class="modal-content">
		<div class="modal-content modal-info">
			<div class="modal-header" align="center">
				<label><h1>Lista de citas</h1></label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body modal-spa">
				<div class="login-grids">
					<div class="login-right1">
						<div class="modal-body">
						    <form method="POST" action="/pacientes/{{ $Datos_Paciente->dni }}" autocomplete="off">
						          {{csrf_field()}}
						          {{method_field('PUT')}}
						          <div class="modal-body">
						            <table class="table table-bordered table-condensed" style="text-align:center">
                                    	<thead >
                                        	<tr><th style="text-align:center">Hora</th><th style="text-align:center">Fecha Cita</th><th style="text-align:center">Fecha Reserva</th><th style="text-align:center">Estado</th><th style="text-align:center">Cancelar Cita</th></tr>
                                    	</thead>
                                    	<tbody id="Mo_Body_ListarCitas">
                                    	</tbody>
                                   	</table>


									</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
@endif


<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<script>
$("#Cargar_Datos").click(function(event){
			$('#Mo_Datos_Paciente').modal({
			show: 'true'
	});
});

$("#btn_Mostrar_Modificar_Datos_Medico").click(function(event){
			$('#Mo_Datos_Medico').modal({
			show: 'true'
	});
});

$("#Reservar_Cita").click(function(event){
      $('#Mo_Especialidades').modal({
      show: 'true'
  });
});
$("#Listar_Cita").click(function(event){
      $('#Mo_ListarCita').modal({
      show: 'true'
  });
});
</script>
<script>
$(document).ready(function() {

$("#btn_Mostrar_Horario").click(function(event){

var Especialidad = $('#Especialidad_Cita').val();

$('#Titulo_Horario').text("HORARIO DE "+$('#Especialidad_Cita option:selected').text());

$.get('Recuperar_Horario',{Especialidad:Especialidad},function(data){

					var dias = data[0];
					var fecha = data[1];
					var estado = data[2];
					var res = data[3];


		var Tabla = $('#Mo_Body_Horario');
		Tabla.empty();
			Tabla.append(
				'<div class="dataTable_wrapper table-responsive">'+
                                  '<table class="table table-bordered table-condensed">'+
                                    '<thead>'+
                                        '<tr>'+
                                        '</tr>'+
                                    '</thead>'+
                                   '</table>');

Tabla.append('<th><div style="width:100px;height:85px;background-color:#2FAED5;"class="panel-heading"><h9>Hora</h9></div></th>');
            for(var i=0;i<7;i++)
            {

            Tabla.append(
			  '<th>'+

                    '<div align="center" style="width:150px;height:85px;background-color:#2FAED5;" class="panel-heading">'+
                        '<h9>'+dias[i]+'</h9>'+
                        fecha[i] +
                  '</div>'+

              '</th>');
			}

			Tabla_Body = $('<tbody style="background-color:#A6CEE0"></tbody>');


			for(var i=14;i<38;i++)
            {
            	if((i<26)||(i>=30))
            	{
								var kk=(i/2);
								var kk2=(kk*100)%100;
								var gg="00";
								var gg2=Math.floor(kk);
								if(kk2==50)gg=30;

								var kkk=((i+1)/2);
								var kkk2=(kkk*100)%100;
								var ggg="00";
								var ggg2=Math.floor(kkk);
								if(kkk2==50)ggg=30;

					Tabla_Body.append(
						'<tr>'+
                            '<td align ="right" style="background-color:#be25b5">');
														if(gg2<9)
														{
															Tabla_Body.append('0'+gg2+':'+gg+' - 0'+(ggg2)+':'+ggg);
														}
														if(gg2==9)
														{
															if(ggg2==9){
																Tabla_Body.append('0'+gg2+':'+gg+' - 0'+(ggg2)+':'+ggg);
															}else{
																Tabla_Body.append('0'+gg2+':'+gg+' - '+(ggg2)+':'+ggg);
															}
														}
														if(gg2>9)
														{
															Tabla_Body.append(gg2+':'+gg+' - '+(ggg2)+':'+ggg);
														}

											  Tabla_Body.append('</td>');

                            for(var j=0;j<7;j++)
                            {

								if(res[j+'-'+i]['estado']==1)
								{
									Tabla_Body.append('<td align="center" class="Hora_Cita_Ocupado" id="'+j+'-'+i+'" value="'+res[j+'-'+i]["idbloques"]+'">Reservado</td>');

								}
								else
								{
									Tabla_Body.append('<td align="center" class="Hora_Cita_Libre" id="'+j+'-'+i+'" value="'+res[j+'-'+i]['idbloques']+'">Disponible</td>');
								}

                            }
            	}
            	else if(i==13)
            	{
					Tabla_Body.append('<td colspan="8" height="25px"></td>');
            	}
				Tabla_Body.append('</tr>');
            }
            Tabla.append(Tabla_Body);



             $(".Hora_Cita_Libre").click(function(event){

                   event.preventDefault();
                   var Id = $("#"+event.target.id).attr('value');
                   var idtd = $("#"+event.target.id).attr('id');


                    var td = $('.fc-resource'+idtd);
                    var head = td.parent().parent().parent().find("thead");
                    var th = head.find("th:eq("+td.index()+")");

                    var Nro_Dia = idtd.substring(0,1);

                   $.get('/Recuperar_Datos_Cita',{Id:Id},function(data){
                   		//alert(data);
                      $('#Datos_Reserva').empty();
                      var info = $('#Datos_Reserva');
                      var th = td.closest('table').find('th').eq(td.index());
                      //alert(th.val());
                      info.append('<p>Médico:'+data[2]+'</p><p>Día:'+data[1]+'</p>');

                      			if(data[0]<9)
                            	{
                            		info.append('<p>Hora:0'+data[0]+':00');
                            	}
                            	if(data[0]==9)
                            	{
                            		info.append('<p>Hora:0'+data[0]+':00');
                            	}
                            	if(data[0]>9)
                            	{
                            		info.append('<p>Hora:'+data[0]+':00');
                            	}
                      	info.append('</p><p>Consultorio:'+data[4]+'</p><p>Especialidad:'+data[3]+'</p><input name="Id" type="hidden" id="Id" value="'+Id+'"><input name="Nro_Dia" type="hidden" id="Nro_Dia" value="'+Nro_Dia+'">');

                      $('#Mo_Registrar_Cita').modal({
                      show: 'true'
                  });
                  });
        });

		});


      $('#Mo_Horario').modal({
      show: 'true'
  		});
	});
});
</script>

<script>
$("#Listar_Cita").click(function(event){
	var idPaciente = $('#dni').val();

$.get('/Recuperar_Citas',{idPaciente:idPaciente},function(data){

var Tabla1 = $('#Mo_Body_ListarCitas');
		Tabla1.empty();

						for (var i = 0; i < data.length; i++) {
              var hora = data[i]["bloques_idbloques"].substring(5,7);

              if(hora%2==0)
              {
                hora = hora+":00";
              }else {
                hora = hora+":30";
              }

							if(data[i]["estado"]=="PENDIENTE")
							{

							 Tabla1.append('<tr><td>'+hora+'</td><td>'+data[i]["fecha_cita"]+'</td><td>'+data[i]["fecha_reserva"]+'</td><td>'+data[i]["estado"]+'</td><td><button id="btn_Cancelar" style="width:150px" value="'+data[i]["id"]+'" type="button" class="btn btn-primary claseboton">Cancelar</button></td></tr>');
							}else {
								Tabla1.append('<tr><td>'+hora+'</td><td>'+data[i]["fecha_cita"]+'</td><td>'+data[i]["fecha_reserva"]+'</td><td>'+data[i]["estado"]+'</td><td></td></tr>');
							}
						}

			$('#Mo_Citas').modal({
			show: 'true'
			});
		});
	});
</script>
<div class="modal fade" id="Mo_Inhabilitado" tabindex="-1" role="dialog" >
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body modal-spa">
				<div class="login-grids">
					<div class="login-right1">
						<div class="modal-body" align="center">
								<h9 align="center">Solo se puede reservar una cita a la vez</h9>

						</div>
						 <div class="modal-footer" align="center">
						 <div align="center" style="text-align:center;">
				          <button align="center" type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
				          </div>
				        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$("#Inhabilitado").click(function(event){
	$('#Mo_Inhabilitado').modal({
			show: 'true'
			});
});
</script>

<script>
$(document).on("click",".claseboton",function(){
	var idcita = $(this).val();
	$.get('/Actualizar_Cancelacion',{idcita:idcita},function(data){
    	$("#Listar_Cita").trigger("click");
	});
});
</script>
</body>
</html>
