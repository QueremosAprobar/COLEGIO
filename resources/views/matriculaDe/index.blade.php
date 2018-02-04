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
		<h3 class="page-header">REGISTRO MATRICULAS
			<button type="button" class="btn btn-primary" onclick="location.href='/matriculas'">Realizar Matricula</button>
		</h3>
	</div>
	<!-- /.col-lg-12-->
</div>
<!-- /row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">

			</div>

		<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					@if($matriculas->isEmpty())
						<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x

						</button>
						No existe ningun Registro de Matricula <a href="#" class="alert-link"> Registre Nueva Matricula</a>.
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
										<th>Nro</th>
										<th>Fecha Mat</th>
										<th>Nivel</th>
										<th>Grado</th>
										<th>Seccion</th>
										<th>Turno</th>
										<th>Situacion</th>
										<th>DNI alum</th>
										<th>DNI apod</th>
										<th>ID Año</th>
										<th>Operaciones</th>
								</tr>
								</thead>
								<tbody>
								@foreach($matriculas as $matricula)
										<tr class="odd gradeA" rol="row">
												<td>{{ $matricula->nromatricula }}</td>
												<td>{{ $matricula->fechamat }} </td>
												<td>{{ $matricula->nivel }}</td>
												<td>{{ $matricula->grado }}</td>
												<td>{{ $matricula->seccion }}</td>
												<td>{{ $matricula->turno }}</td>
												<td>{{ $matricula->situacion }}</td>
												<td>{{ $matricula->dnialumno }}</td>
												<td>{{ $matricula->dniapoderado }}</td>
												<td>{{ $matricula->idanio }}</td>
												<td class="center">
														<ul class="nav nav-pills">
																<li>
																		<a href="{!! action('MatriculaDeController@show', $matricula->nromatricula) !!}" title="Ver">
																				<spam class="glyphicon glyphicon-search"></spam>
																		</a>
																</li>
																<li>
																		<a href="{!! action('MatriculaDeController@edit', $matricula->nromatricula) !!}" title="Editar">
																				<spam class="glyphicon glyphicon-pencil"></spam>
																		</a>
																</li>

														</ul>
												</td>
										</tr>
								@endforeach
								</tbody>
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
