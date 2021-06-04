<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterStudent extends Model
{
    public function depertment(){
    	return $this->hasOne('App\Department','id','st_dept');
	}
}
 