<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CiudadModel extends Model
{
    protected $table = 'ciudad';
    protected $fillable = ['ciu_id','ciu_nombre'];
}
