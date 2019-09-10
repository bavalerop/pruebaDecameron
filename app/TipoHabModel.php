<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoHabModel extends Model
{
    protected $table = 'tipohab';
    protected $fillable = ['thab_id','thab_nombre'];
}
