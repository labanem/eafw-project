<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deptTb extends Model
{
    public function emp_details_tb()
    {
    	return $this->hasMany('App\empDetailsTb','deptid');
    }

    public function wk_emails_tb()
    {
    	return $this->hasManyThrough('App\wkEmailsTb', 'App\empDetailsTb', 'dept_tbs_id', 'emp_details_tbs_id');
    }
}
