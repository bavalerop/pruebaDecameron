<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcomodacionModel extends Model
{
    protected $table = 'acomodacion';
    protected $fillable = ['aco_id','aco_nombre'];
}
