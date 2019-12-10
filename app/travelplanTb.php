<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class travelplanTb extends Model
{
    public function destinations()
    {
    	return $this->belongsToMany('App\destinationTb');
    }

    public function drivers()
    {
    	return $this->belongsTo('App\empDetailsTb', 'drivid');
    }

    public function cars()
    {
        return $this->belongsTo('App\vehicleTb', 'vehid');
    }
}
