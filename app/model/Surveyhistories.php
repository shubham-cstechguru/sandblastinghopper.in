<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Surveyhistories extends Model {
	// 
	protected $table 		= "offer_histories";
    
    const CREATED_AT        = 'created_at';
    const UPDATED_AT        = 'updated_at';

    public function survey()
    {
    	# code...
    	return $this->hasOne('App\Model\Survey','id','task_id');
    }
    public function user()
    {
    	# code...
    	return $this->hasOne('App\User','id','uid');
    }
}
