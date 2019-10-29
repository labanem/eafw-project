<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empDetailsTb extends Model
{
   public function email()
   {
      return $this->hasMany('App\emailsTb', 'empid');
   }
   
   public function department()
   {
   	return $this->belongsTo('App\deptTb', 'deptid');
   }

   public function weekoff()
   {
   	return $this->belongsTo('App\weekOffTb', 'weekid');
   }

   public function company()
   {
      return $this->belongsTo('App\CompTb', 'compid');
   }

   //protected $guarded = ['_token'];
}
