<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class travelplanTb extends Model
{
    public function destinations()
    {
    	return $this->belongsToMany('App\destinationTb')
    				->withPivot('dateout', 'timeout', 'datein', 'timein', 'mileageout', 'mileagein')
    				->withTimeStamps();
    }

    public function drivers()
    {
    	return $this->belongsTo('App\empDetailsTb');
    }
}
