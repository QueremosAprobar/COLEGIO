<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Docente;
class AsignacionPController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $docente=Docente::findOrFail($id);
      if ($docente==null) {
        return view('alumnos.index');
      }
      else{
        return view('asignacionesp.edit',['docente'=>$docente]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('asignacionesP.index');
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {}
    public function edit($id)
    {
      $docente=Docente::findOrFail($id);
      if($docente->nivel=="INICIAL"){
          $gradoseccion=DB::select("select grado, seccion,nivel,turno from matriculas where nivel ='INICIAL' group by grado,seccion,nivel,turno");
      }
      elseif($docente->nivel=="PRIMARIA"){
          $gradoseccion=DB::select("select grado, seccion,nivel,turno from matriculas where nivel ='PRIMARIA' group by grado,seccion,nivel,turno");
      }
      else{
        $gradoseccion=NULL;
      }
      if ($docente==null) {
        return view('alumnos.index');
      }
      else{
        return view('asignacionesp.edit',['docente'=>$docente,'gradoseccion'=>$gradoseccion]);
      }
    }
    public function update(Request $request, $id)
    {
        $idanio=DB::table('aniosescolares')->max('idanio');
        $dnidocente=$id;
        $docente=Docente::findOrFail($id);
        $turno=$request->get('turno');
        $nivel=$docente->nivel;
        $grado="";
        $seccion="";
        if ($nivel!="SECUNDARIA") {
          $gradoseccion=explode('!',$request->get('gradoseccion'));
          $grado=$gradoseccion[0];
          $seccion=$gradoseccion[1];
        }
        $estado=$request->get('estado');
        DB::table('asignacionesp')->insert(
        ['idanio'=>$idanio,'dnidocente'=>$dnidocente,'turno'=>$turno,'nivel'=>$nivel,
        'grado'=>$grado,'seccion'=>$seccion,'estado'=>$estado]
      );

      $asignacionp = DB::table('asignacionesp')->where([
            ['dnidocente', '=', $dnidocente],
            ['estado', '=', 'HABILITADO'],
            ])->first();

      $asignaciones=DB::table('asignaciones')-> where([
            ['dnidocente','=',$dnidocente],
            ['estado','=','HABILITADO'],
            ])->get();
      if($asignacionp==NULL){
          return view('asignaciones.show',['docente'=>$docente,'asignacionp'=>NULL,'asignaciones'=>$asignaciones]);
      }
      else{
          return view('asignaciones.show',['docente'=>$docente,'asignacionp'=>$asignacionp,'asignaciones'=>$asignaciones]);
      }
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
