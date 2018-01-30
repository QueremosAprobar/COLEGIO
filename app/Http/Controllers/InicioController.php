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
    return view('inicio');
  }
  public function about(){
    return view('about');
  }
  public function contact(){
    return view('contact');
  }
  public function layout(){
    return view('layout.layout');
  }
}
