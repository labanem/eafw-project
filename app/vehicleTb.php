<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicleTb extends Model
{
   public function travelplans()
   {
   	return $this->hasMany('App\travelplanTb');
   }

   public function drivers()
   {
   	return $this->belongsToMany('App\empDetailsTb');
   }
}
