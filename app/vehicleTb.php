<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicleTb extends Model
{
   public function travelplans()
   {
   	return $this->hasOne('App\travelplanTb');
   }
}
