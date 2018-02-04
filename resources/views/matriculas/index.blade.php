@extends('layout.layout')
@section('estilos')
<!-- DataTables CSS -->
<script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
<!-- DataTables Responsive CSS -->
<script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@stop
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">ALUMNOS
			<button type="button" class="btn btn-primary" onclick="location.href='alumnos/create'">Nuevo</button>
		</h3>
	</div>
	<!-- /.col-lg-12-->
</div>
<!-- /row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">Seleccione Alumno a Matricular

			</div>

		<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					@if($alumnos->isEmpty())
						<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x

						</button>
						No se tienen alumnos <a href="#" class="alert-link"> Ingrese Alumnos</a>.
						</div>
					@else
						@if(session('mensaje'))
							<div class="alert alert-success">
								<button type="button" class="close"
								data-dismiss="alert" aria-hidden="true">x</button>
								{{ session('mensaje') }}
							</div>
						@endif
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>DNI</th>
								<th>Nombres y Apellido</th>
								<th>Fecha Nacimiento</th>
								<th>Telefono</th>
								<th>Sexo</th>
								<th>Email</th>
								<th>OPERACION</th>
							</tr>
						</thead>
						<body>
							@foreach($alumnos as $alumno)
							<tr class="odd gradeA" rol="row">
								<td>{{ $alumno->dnialumno }}</td>

								<td>{{ $alumno->nombre }} {{ $alumno->apellido }}</td>
								<td>{{ $alumno->fechanac }}</td>
								<td>{{ $alumno->telefono }}</td>
								<td>{{ $alumno->sexo }}</td>
								<td>{{ $alumno->email }}</td>
								<td>
									<a href=" {!! action('AlumnoController1@show',$alumno->dnialumno) !!}">ConstanciaNotas
									<a href=" {!! action('AlumnoController1@edit',$alumno->dnialumno) !!}">MATRICULAR
								  </a>
								</td>
							</tr>
							@endforeach
						</body>
					</table>
					@endif
				</div>
			<!-- /.table-responsiv -->
			</div>
		</div>
	</div>
</div>
@stop

@section('js')
<!-- DataTables JavaScript -->
<script src={{ URL::asset('bower_components/DataTables/media/js/jquery.dataTables.min.js') }}></script>

<script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}></script>
@stop

@section('jsope')
<!-- Page-level demo Scripts - tables - Use for reference -->
<script >
	$(document).ready(function () {
		$('#dataTables-example').DataTable({ responsive:true });
		// body...
	});
</script>
@stop
