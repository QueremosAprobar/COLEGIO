<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\DocenteFormRequest;
use App\Docente;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $item_id='dnidocente';
    public $item=['contraseña','nombre','apellido','direccion','telefono','nivel','especialidad','email','sexo','estado'];
    public $tabla='docentes';
    public $tabla1='cursos';



    public function index()
    {
        //
        $docentes = Docente::all();
        return view('docentes.index',['docentes'=>$docentes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $t1 = DB::table($this->tabla1)->get();
        $t = DB::table($this->tabla)->get();
        return view($this->tabla.'.create',[$this->tabla1=>$t1,$this->tabla=>$t]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocenteFormRequest $request)
    {
        //
        $docente = new Docente;
        $docente->dnidocente=$request->get('dnidocente');
        $docente->contraseña=$request->get('contraseña');
        $docente->nombre=$request->get('nombre');
        $docente->apellido=$request->get('apellido');
        $docente->direccion=$request->get('direccion');
        $docente->telefono=$request->get('telefono');
        $docente->nivel=$request->get('nivel');
        $docente->especialidad=$request->get('especialidad');
        $docente->email=$request->get('email');
        $docente->sexo=$request->get('sexo');
        $docente->estado=$request->get('estado');
        $docente->save();
        return redirect('/docentes')->with('mensaje','Insercion Exitosa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dnidocente)
    {
        //
        $docente=Docente::findOrFail($dnidocente);
        //return view('alumnos.show',compact('alumno'));
        return view($this->tabla.'.show',['docente'=>$docente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dnidocente)
    {
//        $t = DB::table($this->tabla)->where($this->item_id,$dnidocente)->first();
//        $t1 = DB::table($this->tabla1)->get();
//
//        return view($this->tabla.'.edit',[
//            $this->tabla=>$t,
//            $this->tabla1=>$t1
//        ]);
        $docente=Docente::findOrFail($dnidocente);
        $t1 = DB::table($this->tabla1)->get();
        //return View('docente.edit',compact('docente'));
        return view('docentes.edit',['docente'=>$docente,$this->tabla1=>$t1]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dnidocente)
    {
        $this->validate($request,[
            'contraseña'=>['required','max:30','min:6'],
            'nombre'=>['required','max:100','min:3','regex:/^[A-Z ]+$/'],
            'apellido'=>['required','max:100','min:3','regex:/^[A-Z ]+$/'],
            'direccion'=>['required','max:100'],
            'telefono'=>['required','size:9','regex:/^[0-9]+$/'],
            'email'=>['required','max:50','email']
        ]);

        $docente= Docente::findOrFail($dnidocente);
        $docente->dnidocente=$request->get('dnidocente');
        $docente->contraseña=$request->get('contraseña');
        $docente->nombre=$request->get('nombre');
        $docente->apellido=$request->get('apellido');
        $docente->direccion=$request->get('direccion');
        $docente->telefono=$request->get('telefono');
        $docente->nivel=$request->get('nivel');

            $docente->especialidad=$request->get('especialidad');

        $docente->email=$request->get('email');
        $docente->sexo=$request->get('sexo');
        $docente->estado=$request->get('estado');
        $docente ->save();
        return redirect('/docentes')->with('mensaje','Modificacion exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docente = DB::table($this->tabla)->where($this->item_id,$id)->first();
        $estado = 'INHABILITADO';
        if($docente->estado == 'INHABILITADO'){
            $estado = 'HABILITADO';
        }
        DB::table($this->tabla)->where($this->item_id,$id)->update(['estado'=>$estado]);
        return redirect($this->tabla);
    }

}
