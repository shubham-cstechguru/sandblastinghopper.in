<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    
    protected $table 		= "technology";

	public function cat(){
		return $this->hasOne('App\Model\Category', 'id', 'parent');
	}

    
}
