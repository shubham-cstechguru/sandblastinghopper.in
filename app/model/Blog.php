<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $table 		= "blogs";
    const CREATED_AT        = 'created_at';
    const UPDATED_AT        = 'updated_at';

public function cat(){
		return $this->hasOne('App\Model\Category', 'id', 'parent');
	} 
}
