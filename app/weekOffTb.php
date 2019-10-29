<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class weekOffTb extends Model
{
    public function emp_detail()
    {
    	return $this->hasMany('App\empDetailsTb');
    }
}
