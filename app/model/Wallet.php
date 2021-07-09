<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model {
	// 
	protected $table 		= "wallet";
    
    const CREATED_AT        = 'created_at';
    const UPDATED_AT        = 'updated_at';


    public function user()
    {
    	# code...
    	return $this->hasOne('App\User','id','uid');
    }
}
