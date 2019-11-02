<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class compTb extends Model
{
    public function worker()
    {
    	return $this->hasMany('App\empDetailsTb', 'compid');
    }
}
