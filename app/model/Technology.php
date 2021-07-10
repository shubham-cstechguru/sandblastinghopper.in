<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
	protected $guarded = [];

	protected $table 		= "technology";

	public function cat()
	{
		return $this->hasOne('App\model\Category', 'id', 'parent');
	}

	public function city()
	{
		return $this->hasOne('App\model\City', 'id', 'prod_city');
	}

	public function country()
	{
		return $this->hasOne('App\model\Country', 'id', 'prod_country');
	}

    
}
