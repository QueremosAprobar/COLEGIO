<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //

     public $timestamps=false;
     protected $primaryKey='dnialumno';
     protected $foreignKey='dniapoderado';
}
