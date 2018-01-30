<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

//use App\Http\Requests\AulaFormRequest;
use App\aula;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $tabla='aulas';

    public function index()
    {
        //
        $aulas = aula::all();
        return view($this->tabla.'.index',['aulas'=>$aulas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view($this->tabla.'.create');
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
        $aula = new aula;
        $aula->idaula=$request->get('idaula');
        $aula->tipo=$request->get('tipo');
        $aula->capacidad=$request->get('capacidad');
        $aula->save();
        return redirect('/aulas')->with('mensaje','Insercion Exitosa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idaula)
    {
        //
        $aula = DB::table('aulas')->where('idaula', $idaula)->first();
        return view($this->tabla.'.show',['aula'=>$aula]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idaula)
    {
        //
//        $aula=aula::findOrFail($idaula);
        $aula = DB::table('aulas')->where('idaula', $idaula)->first();
        return view($this->tabla.'.edit',['aula'=>$aula]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idaula)
    {
//        $aula= aula::findOrFail($idaula);
//        $aula->idaula=$request->get('idaula');
//        $aula->tipo=$request->get('tipo');
//        $aula->capacidad=$request->get('capacidad');
//        $aula ->save();
//        return redirect('/aulas')->with('mensaje','Modificacion exitosa');
        $id = $request->input('idaula');
        $tipo = $request->input('tipo');
        $cap= $request->input('capacidad');
        //
        DB::table('aulas')
            ->where('idaula', $idaula)
            ->update([
                'idaula' => $id,
                'tipo' => $tipo,
                'capacidad' => $cap
            ]);
        //
        return redirect('/aulas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idaula)
    {
//        $aula = DB::table('aulas')->where('idaula', $idaula)->first();
//        $aula->delete();
//        return redirect('/aulas')->with('mensaje','El aula con id:'.$id.',se elimino');
        DB::table('aulas')->where('idaula',$idaula)->delete();

        return redirect('/aulas')->with('mensaje','El aula con id:'.$idaula.',se elimino');
    }
}
