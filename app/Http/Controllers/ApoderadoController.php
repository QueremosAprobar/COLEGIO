<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ApoderadoFormRequest;
use App\Apoderado;

class ApoderadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $apoderados = Apoderado::all();
        return view('apoderados.index',['apoderados'=>$apoderados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('apoderados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApoderadoFormRequest $request)
    {
        //
        $apoderado=new Apoderado;
        $apoderado->dni=$request->get('dni');
        $apoderado->nombre=$request->get('nombre');
        $apoderado->apellido=$request->get('apellido');
        $apoderado->sexo=$request->get('sexo');
        $apoderado->direccion=$request->get('direccion');
        $apoderado->estadocv=$request->get('estadocv');        
        $apoderado->telefono=$request->get('telefono');
        $apoderado->save();
        return redirect('/apoderados')->with('mensaje','Se inserto correctamente!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $dniapoderado
     * @return \Illuminate\Http\Response
     */
    public function show($dni)
    {
        //
        $apoderado=Apoderado::findOrFail($dni);
        //return view('alumnos.show',compact('alumno'));
        return view('apoderados.show',['apoderado'=>$apoderado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $dniapoderado
     * @return \Illuminate\Http\Response
     */
    public function edit($dni)
    {
        //
        $apoderado=Apoderado::findOrFail($dni);
        //return View('alumnos.edit',compact('alumno'));
        return view('apoderados.edit',['apoderado'=>$apoderado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $dniapoderado
     * @return \Illuminate\Http\Response
     */
    public function update(ApoderadoFormRequest $request, $dni)
    {
        $apoderado=Apoderado::findOrFail($dni);
        $apoderado->nombre=$request->get('nombre');
        $apoderado->apellido=$request->get('apellido');
        $apoderado->sexo=$request->get('sexo');
        $apoderado->direccion=$request->get('direccion');
        $apoderado->estadocv=$request->get('estadocv');        
        $apoderado->telefono=$request->get('telefono');        
        $apoderado->save();
        return redirect('/apoderados')->with('mensaje','Se modifico correctamente!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $dniapoderado
     * @return \Illuminate\Http\Response
     */
    public function destroy($dni)
    {
        $apoderado=Apoderado::findOrFail($dni);
        $apoderado->delete();
        return redirect('/apoderados')->with('mensaje','El apoderado con id:'.$dni.',se elimino correctamente!!');
        //DB::table('alumnos')->where('id',$dniapoderado)->delete();
        //return redirect('/alumnos');
    }
}
