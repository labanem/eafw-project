<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emailsTb extends Model
{
    public function employee()
    {
    	return $this->belongsTo('App\empDetailsTb', 'empid');
    }
}
