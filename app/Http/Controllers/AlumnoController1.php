<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlumnoFormRequest;
use App\Alumno;
use Illuminate\Support\Facades\DB;

class AlumnoController1 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('matriculas.index',['alumnos'=>$alumnos]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      //----------------------------verificando Nivel ----------------------------------------
        //obtenemos el ultimo Nivel cursado
        $nivel = DB::table('cursos')
                ->join('notas', 'cursos.idcurso', 'notas.idcurso')
                ->where('dnialumno',$id)
                ->max('nivel');
        $grado = DB::table('cursos')
                ->join('notas', 'cursos.idcurso', 'notas.idcurso')
                ->where('dnialumno',$id)
                ->where('nivel',$nivel)
                ->max('grado');
        //-------------------------------fin validacion--------------------------------------
        // unimos las tablas curso y notas
        $tablacursonotas = DB::table('cursos')
            ->join('notas', 'cursos.idcurso', 'notas.idcurso')
            ->where('dnialumno',$id)//->select('cursos.*','notas.promedio')
            ->where('grado',$grado)->get();
        $apo=DB::table('alumnos')
                ->select('dniapoderado')
                ->where('dnialumno',$id)->get();
        //CASOS PARA MATRICULARSE
        return View('matriculas.show', ['id'=>$id,
                                        'tablacursonotas'=>$tablacursonotas,
                                         'nivel'=>$nivel,'apo'=>$apo,'grado'=>$grado]);
    }
         public function store(Request $request)
         {
           $nromatricula=$request->input('nromatricula');
           $fechamat=$request->input('fechamat');
           $nivel=$request->input('nivel');
           $grado=$request->input('grado');
           $seccion=$request->input('seccion');
           $turno=$request->input('turno');
           $situacion=$request->input('situacion');
           $dnialumno=$request->input('dnialumno');
           $dniapoderado=$request->input('dniapoderado');
           $idanio=$request->input('idanio');
           DB::table('matriculas')->insert([
             'nromatricula'=>$nromatricula,
             'fechamat'=>$fechamat,
             'nivel'=>$nivel,
             'grado'=> $grado,
             'seccion'=>$seccion,
             'turno'=>$turno,
             'situacion'=>$situacion,
             'dnialumno'=>$dnialumno,
             'dniapoderado'=>$dniapoderado,
             'idanio'=>$idanio
           ]);
           return redirect('mantenimientos');
         }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //Enviamos los contactos en la variable $administrativos

       //$grado = $request->input('Grado');
       //http://desarrollowebtutorial.com/laravel-eloquent-orm-query-builder-consultas-sql/#Consultas_basicas
        //$matDe=DB::table('notas')->where('dnialumno',$id)->get();
        //consulta para obtener el ultimo numero de matricula
        $numeros=DB::table('matriculas')->select('nromatricula')->orderBy('nromatricula', 'desc')->first();
      //----------------------------verificando Nivel ----------------------------------------
        //obtenemos el ultimo Nivel cursado
        $nivel = DB::table('cursos')
                ->join('notas', 'cursos.idcurso', 'notas.idcurso')
                ->where('dnialumno',$id)
                ->max('nivel');
      //--------------------------------------------------------------------------------------
    /*  $aula = DB::table('aulas')
                //->join('notas', 'cursos.idcurso', '=', 'notas.idcurso')
                ->where('tipo',$nivel)
                ->max('capacidad');
      //--------------------------------------------------------------------------------------*/
        //obtenemos el ultimo grado cursado
        /*$grado = DB::table('cursos')
                ->join('notas', 'cursos.idcurso', '=', 'notas.idcurso')
                ->where('dnialumno',$id)
                ->max('grado');*/
        $anio=DB::table('aniosescolares')->max('idanio');
        $grado = DB::table('cursos')
                ->join('notas', 'cursos.idcurso', 'notas.idcurso')
                ->where('dnialumno',$id)
                ->where('nivel',$nivel)
                ->max('grado');

        $gradoV = DB::table('cursos')->join('notas', 'cursos.idcurso', 'notas.idcurso')
                  ->where('dnialumno',$id)
                  ->where('nivel',$nivel)
                  ->max('grado');//grado valido
        //verificamos el estado del estudiante si paso de año o no
        $promedios = DB::table('cursos')
                ->join('notas', 'cursos.idcurso', 'notas.idcurso')
                ->where('dnialumno',$id)
                ->where('grado',$grado)
                ->pluck('promedio');
                $Num=0; //numero de cursos aprobados
                $estado="";
                $tamaño=0;
                foreach ($promedios as $promedio)
                {
                  $tamaño=  $tamaño+1;//NUMERO TOTAL DE CURSOS
                  if($promedio<=10){
                    $Num=$Num+1;
                  }
                }
               /* if($Num<=$tamaño){
                  if($Num<3){//CAMBIAR  TIENE QUE SER MENOS A 3 CURSOS JALADOS RECIEN SE DESAPUEBA
                    $estado="DESAPROBADO";
                  }
                  else{
                    $estado="APROBADO";//aprobo los los cursos
                    $gradoV=$gradoV+1;
                  }
                }*/
        //verificamos a que seccion se va matricular
        $secciones=["A","B","C","D","E","F","G","H","I","J"];
        $limite=30;       //lmite de alumnos por salon
        $seccion="";
        //----------------------------verificando turno ----------------------------------------
        $turnos=["MAÑANA","TARDE","NOCTURNO"];
        $turnos1=[1,2,3];     //lmite de alumnos por salon
        $turno="";
      //--------------------------------------------------------------------------------------
        for($i=0;$i<8;$i++){
          $Nmatricula=DB::table('matriculas')
                        ->where('grado',$gradoV)
                        ->where('seccion',$secciones[$i])
                        ->where('nivel',$nivel)
                        ->pluck('grado')->count();//cuenta cuantos matriculados hay por grado y seccion
              if($Nmatricula<$limite){
                  $seccion=$secciones[$i];
                  break;
                }

                else{
                  $seccion=$secciones[$i+1];
                }
            }
            $limJalados=2;               // variar de acuerdo a los cursos jalados (ojo)
            //-----------------------------   VALIDACION    -----------------------------------------
                  if($Num>=$limJalados){
                    $estado="DESAPROBADO";
                  }
                  else
                  {
                    $estado="APROBADO";                 //aprobo los los cursos
                    if($nivel=="PRIMARIA" && $grado==6)
                    {
                      $nivel="SECUNDARIA";
                      $gradoV=1;
                    }
                      else
                      {
                        $gradoV=$gradoV+1;
                      }
                  }
        //------------------------------validacion de codigo matricula------------------------
          $codvalidacion=DB::table('matriculas')
            ->where('dnialumno',$id)//->select('cursos.*','notas.promedio')
            ->where('idanio',$anio)->count('nromatricula');
        //-------------------------------fin validacion--------------------------------------
        // unimos las tablas curso y notas
        $tablacursonotas = DB::table('cursos')
            ->join('notas', 'cursos.idcurso', 'notas.idcurso')
            ->where('dnialumno',$id)//->select('cursos.*','notas.promedio')
            ->where('grado',$grado)->get();


        $apo=DB::table('alumnos')
                ->select('dniapoderado')
                ->where('dnialumno',$id)->get();

        //CASOS PARA MATRICULARSE
        return View('matriculas.edit', ['estado'=>$estado,'id'=>$id,'numeros' => $numeros,
                                        'tablacursonotas'=>$tablacursonotas,'gradoV'=>$gradoV,
                                        'seccion'=>$seccion, 'nivel'=>$nivel,'Nmatricula'=>$Nmatricula,'anio'=>$anio,'apo'=>$apo,'codvalidacion'=>$codvalidacion]);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $nromatricula=$request->input('nromatricula');
      $fechamat=$request->input('fechamat');
      $nivel=$request->input('nivel');
      $grado=$request->input('grado');
      $seccion=$request->input('seccion');
      $turno=$request->input('turno');
      $situacion=$request->input('situacion');
      $dnialumno=$request->input('dnialumno');
      $dniapoderado=$request->input('dniapoderado');
      $idanio=$request->input('idanio');
      //primera forma
      //DB::inser('insert into administrativos values('','','','')',[$id, ...]);
      //segunda forma
      DB::table('matriculas')->insert([
          'nromatricula'=>$nromatricula,
          'fechamat'=>$fechamat,
          'nivel'=>$nivel,
          'grado'=>$grado,
          'seccion'=>$seccion,
          'turno'=>$turno,
          'situacion'=>$situacion,
          'dnialumno'=>$dnialumno,
          'dniapoderado'=>$dniapoderado,
          'idanio'=>$idanio,
      ]);
      return redirect()->action('MatriculaDeController@index');
      //return redirect('/matriculas/matriculaDe.index')->with('mensaje','Se inserto correctamente!!');
      //redireccionamos al listar
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno=Alumno::findOrFail($id);
        $alumno->delete();
        return redirect('/alumnos')->with('mensaje','El alumno con id:'.$id.',se elimino correctamente!!');
    }
}
