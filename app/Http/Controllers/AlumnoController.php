<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\AlunnoFormRequest;
use App\Alumno;


class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index',['alumnos'=>$alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlunnoFormRequest $request)
    {
        //
        $alumno = new Alumno;
        $alumno->dnialumno=$request->get('dnialumno');
        $alumno->nombre=$request->get('nombre');
        $alumno->contraseña=$request->get('contraseña');        
        $alumno->apellido=$request->get('apellido');
        $alumno->fechanac=$request->get('fechanac');
        $alumno->telefono=$request->get('telefono');
        $alumno->sexo=$request->get('sexo');
        $alumno->email=$request->get('email');
        $alumno->direccion=$request->get('direccion');
        $alumno->distrito=$request->get('distrito');
        $alumno->provincia=$request->get('provincia');
        $alumno->departamento=$request->get('departamento');
        $alumno->save();
        return redirect('/alumnos')->with('mensaje','Se inserto correctamente!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno=Alumno::findOrFail($id);
        return view('alumnos.show',['alumno'=>$alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dnialumno)
    {
        $alumno=Alumno::findOrFail($dnialumno);
        return view('alumnos.edit',['alumno'=>$alumno]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlunnoFormRequest $request, $id)
    {
        $alumno=Alumno::findOrFail($id);
        $alumno->contraseña=$request->get('contraseña');
        $alumno->nombre=$request->get('nombre');
        $alumno->apellido=$request->get('apellido');
        $alumno->fechanac=$request->get('fechanac');
        $alumno->telefono=$request->get('telefono');
        $alumno->sexo=$request->get('sexo');
        $alumno->email=$request->get('email');
        $alumno->direccion=$request->get('direccion');
        $alumno->distrito=$request->get('distrito');
        $alumno->provincia=$request->get('provincia');
        $alumno->departamento=$request->get('departamento');
        $alumno->save();
        return redirect('/alumnos')->with('mensaje','Se modifico correctamente!!');
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
