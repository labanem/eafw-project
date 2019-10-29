<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subDeptTb extends Model
{
    public function exts()
    {
    	return $this->hasMany('App\extTb', 'sdeptid');
    }
}
