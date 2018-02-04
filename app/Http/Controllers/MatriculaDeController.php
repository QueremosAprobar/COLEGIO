<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class MatriculaDeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matriculas=DB::table('matriculas')->get();
        //Enviamos los contactos en la variable $administrativos
        return view('matriculaDe.index',['matriculas'=>$matriculas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('matriculas.create');
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
        $matricula = new Matricula;
        $matricula->nromatricula=$request->get('nromatricula');
        $matricula->fechamat=$request->get('fechamat');
        $matricula->nivel=$request->get('nivel');
        $matricula->grado=$request->get('grado');
        $matricula->seccion=$request->get('seccion');
        $matricula->turno=$request->get('turno');
        $matricula->situacion=$request->get('situacion');
        $matricula->dnialumno=$request->get('dnialumno');
        $matricula->idcolegio=$request->get('idcolegio');
        $matricula->dniapoderado=$request->get('dniapoderado');
        $matricula->idanio=$request->get('idanio');
        $matricula->estado=$request->get('estado');
        $matricula->save();
        return redirect('/matriculas')->with('mensaje','Se inserto correctamente!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $matricula=DB::table('matriculas')->where('nromatricula',$id)->first();
        //Mandamos los datos a la view.show
        return view('matriculaDe.show',['matricula' => $matricula]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idanio=DB::table('aniosescolares')->get();
        $matricula=DB::table('matriculas')->where('nromatricula',$id)->first();
        return view('matriculaDe.edit',['matricula' => $matricula,'idanio'=>$idanio]);
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
        $nivel = $request->input('nivel');
        $grado = $request->input('grado');
        $seccion = $request->input('seccion');
        $turno = $request->input('turno');
        $situacion = $request->input('situacion');
        $dnialumno = $request->input('dnialumno');
        $dniapoderado = $request->input('dniapoderado');
        $idanio = $request->input('idanio');

        DB::table('matriculas')
            ->where('nromatricula',$id)
            ->update([
                'nromatricula' => $nromatricula,
                'fechamat' => $fechamat,
                'nivel' => $nivel,
                'grado' => $grado,
                'seccion' => $seccion,
                'turno' => $turno,
                'situacion' => $situacion,
                'dnialumno' => $dnialumno,
                'dniapoderado' => $dniapoderado,
                'idanio' => $idanio,
                ]);

        return redirect('/matriculas');
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
