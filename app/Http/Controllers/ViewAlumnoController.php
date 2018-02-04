<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ViewAlumnoFormRequest;
use App\ViewAlumno;

class ViewAlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$viewalumnos = ViewAlumno::all();
      $tabalumno=DB::select('select  a.dnialumno, a.nombre,a.apellido,a.dniapoderado,m.nromatricula,m.nivel,m.grado,m.seccion,m.turno
                from alumnos a inner join matriculas m on a.dnialumno=m.dnialumno
                  where a.dnialumno=48607310');
      $horario=DB::select('select gg.dnialumno,M.idcurso,M.nivel,M.grado,M.dia,M.hora,M.nombre, gg.turno
              from(select a.idcurso,a.nivel,a.grado,a.dia,a.hora,c.nombre
              from asignaciones a inner join  cursos c on a.idcurso=c.idcurso ) M
              inner join matriculas gg on M.grado=gg.grado and M.nivel=gg.nivel
              where dnialumno=48607310');
      return view('viewalumnos.index',['tabaalumno'=>$tabalumno,'cursohorario'=>$horario]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dnialumno)
    {
        /*$tabalumno=DB::select('select A.nombre,A.apellido,P.turno,P.seccion,P.grado,P.nivel,P.dia,P.hora,A.dnialumno,P.nombre as nombrecurso
                                    from(select ma.nromatricula,ma.dnialumno,ma.turno,ma.seccion,ma.grado,M.nombre,M.dia,M.hora,ma.nivel
                                    	from (select a.dnidocente,a.idcurso,a.nivel,a.grado,a.dia,a.hora,c.nombre
                                    	from asignaciones a inner join cursos c on a.idcurso=c.idcurso ) M
                                        inner join matriculas ma
                                    	on M.grado=ma.grado and M.nivel=ma.nivel) P inner join  alumnos A on P.dnialumno=A.dnialumno
                                        where A.dnialumno=0001');
        return view('viewalumnos.show',['tabaalumno'=>$tabalumno]);*/
        $notas=DB::select('select MM.idcurso,MM.dnialumno,MM.p1,MM.p2,MM.p3,MM.promedio,MM.nombre
                from (select n.idcurso,n.dnialumno,n.p1,n.p2,n.p3,n.promedio,c.nombre
                from notas n inner join cursos c on n.idcurso=c.idcurso) MM inner join alumnos a on MM.dnialumno=a.dnialumno
                where a.dnialumno=?',[$dnialumno]);
        return view('viewalumnos.show',['notas'=>$notas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
