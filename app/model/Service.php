<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    
    protected $table 		= "services";

	public function cat(){
		return $this->hasOne('App\Model\Category', 'id', 'parent');
	}

    
}
