<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelModel extends Model
{
    protected $table = 'hotel';
    protected $fillable = ['hot_nit','hot_nombre','hot_direc','num_hab','ciudad_cod'];
}
