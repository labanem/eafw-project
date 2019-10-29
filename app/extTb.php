<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class extTb extends Model
{
    public function sub_dept()
    {
    	return $this->belongsTo('App\subDeptTb', 'sdeptid');
    }
}
