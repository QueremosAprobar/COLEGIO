<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Anio;
use Illuminate\Support\Facades\DB;

class AnioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anios = Anio::all();
        return view('anios.index',compact('anios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anios = Anio::all();
        return view('anios.create',compact('anios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Anios = new Anio;
        $Anios->idanio=$request->get('idanio');
        $Anios->fechaini=$request->get('fechaini');
        $Anios->fechafin=$request->get('fechafin');
        $Anios->estado=$request->get('estado');
        $Anios->save();
        return redirect('/anios')->with('mensaje','Se inserto correctamente!!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anios=Anio::findOrFail($id);
        return view('anios.edit',compact('anios'));
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
        $Anios=Anio::findOrFail($id);
        $Anios->idanio=$request->get('idanio');
        $Anios->fechaini=$request->get('fechaini');
        $Anios->fechafin=$request->get('fechafin');
        $Anios->estado=$request->get('estado');
        $Anios->save();
        return redirect('/anios')->with('mensaje','Se inserto correctamente!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idprogramacion)
    {
        DB::table('programaciones')->where('idprogramacion',$idprogramacion)->delete();
        return redirect('/programaciones');
    }
}
