<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anio extends Model
{
	public $timestamps = false;
    protected $table = 'aniosescolares';
    protected $primaryKey = 'idanio';
}
