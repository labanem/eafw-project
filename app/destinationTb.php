<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class destinationTb extends Model
{
    public function travelplans()
    {
    	return $this->belongsToMany('App\travelplanTb');
    }
}
