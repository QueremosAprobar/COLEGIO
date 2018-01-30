<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class InicioController extends Controller
{

  public function index(){
    $especialidades = DB::table('especialidades')->get();
    if(Auth::guest()){
      return view('inicio',['user_name'=>'','especialidades'=>$especialidades]);
    }else{
        $var=DB::table('users')->where('dni', Auth::user()->dni)->first();
        if($var->tipo=='Medico'){
          $var=DB::table('medicos')->where('dni', Auth::user()->dni)->first();
          $var2='Medico: '.$var->nombres." ".$var->apellidos;
          return view('inicio',['user_name'=>$var2,'Datos_Medico'=>$var,'especialidades'=>$especialidades]);
        }else{
        if($var->tipo=='Paciente'){
          $var=DB::table('pacientes')->where('dni', Auth::user()->dni)->first();
          $var2='Paciente: '.$var->nombres." ".$var->apellidos;
          return view('inicio',['user_name'=>$var2,'Datos_Paciente'=>$var,'especialidades'=>$especialidades]);
        }else{
          $var2=$var->dni;
          return view('inicio',['user_name'=>$var2,'especialidades'=>$especialidades]);
        }
      }
    }
  }
  public function about(){
    $especialidades = DB::table('especialidades')->get();
    if(Auth::guest()){
      return view('about',['user_name'=>'','especialidades'=>$especialidades]);
    }else{
        $var=DB::table('users')->where('dni', Auth::user()->dni)->first();
        if($var->tipo=='Medico'){
          $var=DB::table('medicos')->where('dni', Auth::user()->dni)->first();
          $var2='Medico: '.$var->nombres." ".$var->apellidos;
          return view('about',['user_name'=>$var2,'especialidades'=>$especialidades]);
        }else{
        if($var->tipo=='Paciente'){
          $var=DB::table('pacientes')->where('dni', Auth::user()->dni)->first();
          $var2='Paciente: '.$var->nombres." ".$var->apellidos;
          return view('about',['user_name'=>$var2,'Datos_Paciente'=>$var,'especialidades'=>$especialidades]);
        }else{
          $var2=$var->dni;
          return view('about',['user_name'=>$var2,'especialidades'=>$especialidades]);
        }
      }
    }
  }
  public function gallery(){
    $especialidades = DB::table('especialidades')->get();
    if(Auth::guest()){
      return view('gallery',['user_name'=>'','especialidades'=>$especialidades]);
    }else{
        $var=DB::table('users')->where('dni', Auth::user()->dni)->first();
        if($var->tipo=='Medico'){
          $var=DB::table('medicos')->where('dni', Auth::user()->dni)->first();
          $var2='Medico: '.$var->nombres." ".$var->apellidos;
          return view('gallery',['user_name'=>$var2,'especialidades'=>$especialidades]);
        }else{
        if($var->tipo=='Paciente'){
          $var=DB::table('pacientes')->where('dni', Auth::user()->dni)->first();
          $var2='Paciente: '.$var->nombres." ".$var->apellidos;
          return view('gallery',['user_name'=>$var2,'Datos_Paciente'=>$var,'especialidades'=>$especialidades]);
        }else{
          $var2=$var->dni;
          return view('gallery',['user_name'=>$var2,'especialidades'=>$especialidades]);
        }
      }
    }
  }
  public function contact(){
    $especialidades = DB::table('especialidades')->get();
    if(Auth::guest()){
      return view('contact',['user_name'=>'','especialidades'=>$especialidades]);
    }else{
        $var=DB::table('users')->where('dni', Auth::user()->dni)->first();
        if($var->tipo=='Medico'){
          $var=DB::table('medicos')->where('dni', Auth::user()->dni)->first();
          $var2='Medico: '.$var->nombres." ".$var->apellidos;
          return view('contact',['user_name'=>$var2,'especialidades'=>$especialidades]);
        }else{
        if($var->tipo=='Paciente'){
          $var=DB::table('pacientes')->where('dni', Auth::user()->dni)->first();
          $var2='Paciente: '.$var->nombres." ".$var->apellidos;
          return view('contact',['user_name'=>$var2,'Datos_Paciente'=>$var,'especialidades'=>$especialidades]);
        }else{
          $var2=$var->dni;
          return view('contact',['user_name'=>$var2,'especialidades'=>$especialidades]);
        }
      }
    }
  }
}
