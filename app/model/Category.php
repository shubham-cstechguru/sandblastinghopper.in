<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


	protected $table 		= "category";
    const CREATED_AT        = 'created_at';
    const UPDATED_AT        = 'updated_at';
  
    public function product(){
        return $this->hasMany('App\model\Technology', 'parent', 'id');
   }
   public function blog(){
        return $this->hasMany('App\model\Blog', 'parent', 'id');
   }
    public function faq(){
        return $this->hasMany('App\Model\Faq', 'parent', 'id');
   }
}
