@extends('layout.layout')
@section('estilos')
    <!-- Datatables CSS -->
    <script src={{
    URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
    <!-- DataTables Responsive CSS -->

    <script src={{
    URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>

@stop
@section('content')
<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">  DETALLE NOTAS

            </h3>
        </div>
        <!-- col-lg-12 -->
    </div>
 <div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
			</div>
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<div class="form-group">
                    <label>Grado: {{$grado}} </label><br>
                    <label>Nivel: {{$nivel}}</label><br>
                    @foreach($apo as $ap)
                          <label>DNI del Apoderado: {{$ap->dniapoderado}} </label>
                    @endforeach
          </div>
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>IdCurso</th>
                <th>nombre</th>
                <th>nivel</th>
                <th>grado</th>
								<th>nota1</th>
								<th>nota2</th>
								<th>nota3</th>
								<th>promedio</th>
							</tr>
						</thead>
						<body>
              @foreach($tablacursonotas as $mat)
              <tr class="odd gradeA" rol="row">
                <td>{{$mat->idcurso}}</td>
                <td>{{$mat->nombre}} </td>
                <td>{{$mat->nivel}}</td>
                <td>{{$mat->grado}}</td>
                <td>{{$mat->p1}}</td>
                <td>{{$mat->p2}}</td>
                <td>{{$mat->p3}}</td>
                <td>{{$mat->promedio}}</td>
              </tr>
              @endforeach
						</body>
					</table>
          <button type="submit" class="btn btn-success" onClick="location.href='/matriculas'">Generar Reporte</button>
          <button type="button" class="btn btn-danger" onClick="location.href='/matriculas'">Volver</button>
				</div>
			</div>
		</div>

	</div>

</div>
@stop

@section('js')
<!-- DataTables JavaScript -->


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
