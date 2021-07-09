<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    //
    protected $table 		= "faq";
    const CREATED_AT        = 'created_at';
    const UPDATED_AT        = 'updated_at';

public function cat(){
		return $this->hasOne('App\Model\Category', 'id', 'parent');
	} 
}
