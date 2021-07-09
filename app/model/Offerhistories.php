<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Offerhistories extends Model {
	// 
	protected $table 		= "offer_histories";
    
    const CREATED_AT        = 'created_at';
    const UPDATED_AT        = 'updated_at';


    public function offer()
    {
    	# code...
    	return $this->hasOne('App\Model\Offer','id','task_id');
    }
    public function user()
    {
    	# code...
    	return $this->hasOne('App\User','id','uid');
    }
}
