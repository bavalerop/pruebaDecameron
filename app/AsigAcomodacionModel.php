<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsigAcomodacionModel extends Model
{
    protected $table = 'asig_acomodacion';
    protected $fillable = ['cant_hab','thab_cod','aco_cod','hot_cod'];
}
