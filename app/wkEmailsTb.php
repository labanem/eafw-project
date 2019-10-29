<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wkEmailsTb extends Model
{
 	public function employee()
 	{
 		return $this->hasOne('App\empDetailsTb', 'empid');
 	}
}
