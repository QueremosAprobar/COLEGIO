@extends('index')
@section('benners')
<div class="banner page_head"></div>
@endsection
@section('mas')
<div class="map_contact">
	<div class="container">
		<center><azul>CONTACTANOS</azul></center>
		<div class="contact-grids">
<br>
			<div align:"center">
				<h4>Para cualquier consulta o ayuda, escríbenos un mensaje a nuestro correo. Recuerda que estamos al servicio de la sociedad y lo mas importante para nosotros los alumnos.</h4>
				<ul class="contact-list">
					<li><h4><span class="glyphicon glyphicon-map-marker" aria-hidden="true" ></span> Calle Chaparo #123, Santiago, Cusco</h4></li>
					<li><h4><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a>inmaculada_concepcion@google.com.pe</a></h4></li>
					<li><h4><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>(084) 000000</h4></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
		<center><azul>Guiate con el mapa</azul><center>
		<div class="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2482.432383990807!2d0.028213999961443994!3d51.52362882484525!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1423469959819" style="border:0"></iframe>
		</div>
	</div>
</div>
@endsection
