<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Docente;

class AsignacionController extends Controller
{
  public function index()
  {}
  public function create()
  {}

  public function store(Request $request)
  {}

public function show($dnidocente)
  {
    $docente=Docente::findOrFail($dnidocente);
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

  public function edit($data)
  {
    $datos=explode("!",$data);
    $docente=Docente::findOrFail($datos[0]);
    $asignacionp=DB::table('asignacionesp')->where([
        ['dnidocente','=',$docente->dnidocente]
      ])->first();
    $asignacion=DB::table('asignaciones')-> where([
          ['dnidocente','=',$docente->dnidocente],
          ['estado','=','HABILITADO'],
          ['dia','=',$datos[1]],
          ['hora','=',$datos[2]],
          ])->first();
    if($docente->nivel=='PRIMARIA'){
      $cursos=DB::table('cursos')->where([
            ['nivel','=',$docente->nivel],
            ['grado','=',$datos[3]],
            ])->get();}
    elseif($docente->nivel=='INICIAL'){
      $cursos=DB::table('cursos')->where([
            ['nivel','=',$docente->nivel]
            ])->get();}
    else{
      $cursos=NULL;
    }
    if($docente->nivel=="SECUNDARIA"){
        $gradoseccion=DB::select("select grado, seccion,nivel,turno from matriculas where nivel='SECUNDARIA' group by grado,seccion,nivel,turno");
    }
    else{
      $gradoseccion=NULL;
    }
    return view('asignaciones.edit',['gradoseccion'=>$gradoseccion,'asignacionp'=>$asignacionp,
                'docente'=>$docente,'dia'=>$datos[1],'hora'=>$datos[2],'asignacion'=>$asignacion,'cursos'=>$cursos]);

  }
  public function update(Request $request, $id)
  {
      $docente=Docente::findOrFail($id);
      $anio=DB::table('aniosescolares')->max('idanio');
      $asignacionp=DB::table('asignacionesp')->where('dnidocente',$id)->first();
      $gradoseccion=$request->get('gradoseccion');
      $gradosec=explode('!',$gradoseccion);
      $grado=$gradosec[0];
      $seccion=$gradosec[1];
      $dia=$request->get('dia');
      $hora=$request->get('hora');
      if($docente->nivel!='SECUNDARIA'){
        $idcurso=$request->get('curso');
        $nombrecurso=DB::table('cursos')->where('idcurso',$idcurso)->first();
        $nombrec=$nombrecurso->nombre;
      }
      else{
        $curso=DB::table('cursos')->where([
        ['nombre','=',$docente->especialidad],
        ['nivel','=','SECUNDARIA'],
        ['grado','=',$grado]
        ])->first();
        $idcurso=$curso->idcurso;
        $nombrec=$curso->nombre;
      }
      DB::table('asignaciones')->insert(
      ['dnidocente'=>$docente->dnidocente,
      'idcurso'=>$idcurso,
      'nombrecurso'=>$nombrec,
      'idanio'=>$anio,
      'turno'=>$asignacionp->turno,
      'nivel'=>$asignacionp->nivel,
      'grado'=>$grado,
      'seccion'=>$seccion,
      'dia'=>$dia,
      'hora'=>$hora,
      'estado'=>$request->get('estado')
      ]
    );

    $docente=Docente::findOrFail($id);
    $asignacionp = DB::table('asignacionesp')->where([
          ['dnidocente', '=', $id],
          ['estado', '=', 'HABILITADO'],
          ])->first();

    $asignaciones=DB::table('asignaciones')-> where([
          ['dnidocente','=',$id],
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
