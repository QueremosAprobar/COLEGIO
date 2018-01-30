@extends('layout.layout')

@section('estilos')
    <!-- Datatables CSS -->
    <script src={{
    URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
    <!-- DataTables Responsive CSS -->

    <script src={{
    URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>

@stop

<script type="text/javascript">
/* Sumar dos números. */
function promediar (valor) {
    var total = 0;  
    valor = parseInt(valor); // Convertir el valor a un entero (número).
    
    total = document.getElementById('spTotal').innerHTML;
    
    // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
    total = (total == null || total == undefined || total == "") ? 0 : total;
    
    /* Esta es la suma. */
    total = (parseInt(total) + parseInt(valor));
    
    // Colocar el resultado de la suma en el control "span".
    document.getElementById('spTotal').innerHTML = total;
}

function p(){
var num1 = parseFloat(document.getElementById('n1').value);
var num2 =parseFloat(document.getElementById('n2').value);
var num3 = parseFloat(document.getElementById('n3').value);
var pro =(num1+num2+num3)/3;
if(!isNaN(pro))
document.getElementById('promedio').innerHTML = pro.toFixed(2);
}
window.onload = p;
</script>

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Seleccione su Curso
                <SELECT NAME="selCombo" SIZE=1 onChange="javascript:alert('prueba');"> 
                    <OPTION VALUE="1">Link1</OPTION>
                    <OPTION VALUE="2">Link2</OPTION>
                    <OPTION VALUE="3">Link3</OPTION>
                    <OPTION VALUE="4">Link4</OPTION> 
                </SELECT>
            </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"></div>
                <!--.panel-heading-->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        @if($Notas->isEmpty())
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    x
                                </button>
                                No se tiene ninguna nota
                                <a href="#" class="alert-link">Ingrese Notas</a>
                            </div>
                        @else
                            @if(session('mensaje'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        x
                                    </button>
                                    {{ session('mensaje') }}
                                </div>
                            @endif

                            <table class="table table-striped table-bordered table-hover" idcurso="dataTables-example">
                                <thead>
                                <tr>
                                    <th>idcurso</th>
                                    <th>dnialumno</th>
                                    <th>p1</th>
                                    <th>p2</th>
                                    <th>p3</th>
                                    <th>promedio</th>
                                    <th>Observaciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($Notas as $Nota)

                                    <tr class="odd gradeA" rol="row">
                                        <td>{{ $Nota->idcurso }}</td>
                                        <td>{{ $Nota->dnialumno }}</td>                                    
                                        <td>
                                           <input type="number"  id="n1" onchange="p();" min="0.00"
                                                max="20.00" step=".01" value={{ $Nota->p1 }} />
                                            <a title="Editar" >
                                                <span class="glyphicon glyphicon-pencil"></span>                                                
                                            </a>
                                        </td>
                                        <td>
                                            <input type="number"  id="n2" onchange="p();" min="0.00"
                                                max="20.00" step=".01" value={{ $Nota->p2 }} />
                                            <a title="Editar" >
                                                <span class="glyphicon glyphicon-pencil"></span>                                                
                                            </a>                                          
                                        </td>
                                        <td>
                                            <input type="number"  id="n3" onchange="p();" min="0.00"
                                                max="20.00" step=".01" value={{ $Nota->p3 }} />
                                            <a title="Editar" >
                                                <span class="glyphicon glyphicon-pencil"></span>                                                
                                            </a>  
                                        </td>
                                        <td><span id="promedio"></span></td>
                                        <td> 
                                            @if( ($Nota->p3 + $Nota->p2 + $Nota->p1)/3 > 10 )
                                                <p style="color:red;">Aprobado</p> 
                                            @else <p style="color:red;">Desaprobado</p> @endif
                                        </td>                                      
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <!--.table-rsponsive-->
                </div>
            </div>

        </div>

    </div>
    <button type="button" class="btn btn-primary" onclick="location.href='Notas/create'">
                    Nuevo
    </button>

<form action="../../form-result.php" method="post" target="_blank">

  <p>

    Limones usados para el jugo: <input type="number" name="limonesusados" min="1" max="5" step="0.5">

    <input type="submit" class="btn btn-primary" value="Enviar datos">

  </p>

</form>


@stop

@section('js')
    <!--Datatables JavaScript-->
    <script src={{ URL::asset('bower_components/DataTables/media/js/jquery.dataTables.min.js') }}></script>


    <script src={{ URL::asset('bower_components/dataTables-plugins/integration/bootstrap/3/.dataTables.bootstrap.min.js') }}></script>


@stop

@section('jsope')

    <!--Page-Level Demo Scripts - Tables- Use for reference-->
    <script>
        $(document).ready(function () {
            $('dataTables-example').DataTable({
                responsive:true
            });
        });
    </script>
@stop