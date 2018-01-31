<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\CursoFormRequest;
use App\Curso;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cursos = Curso::all();
        return view('cursos.index',['cursos'=>$cursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cursos.create');
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
        $curso= new Curso;
        $curso->nombre=$request->get('nombre');
        $curso->nivel=$request->get('nivel');
        $curso->grado=$request->get('grado');

        $curso->save();
        return redirect('/cursos')->with('mensaje','Se inserto correctamente!!');
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
        $curso=Curso::findOrFail($id);
        return view('cursos.show',['curso'=>$curso]);
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
        $curso=Curso::findOrFail($id);
        return view('cursos.edit',['curso'=>$curso]);
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
        $curso= Curso::findOrFail($id);
        $curso ->nombre= $request->get('nombre');
        $curso ->nivel= $request->get('nivel');
        $curso ->grado= $request->get('grado');
        $curso ->save();
        return redirect('/cursos')->with('mensaje','Modificacion exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso=Curso::findOrFail($id);
        $curso->delete();
        return redirect('/cursos')->with('mensaje','El Curso con id:'.$id.',se elimino correctamente!!');
        //DB::table('alumnos')->where('id',$id)->delete();
        //return redirect('/alumnos');
    }
}
