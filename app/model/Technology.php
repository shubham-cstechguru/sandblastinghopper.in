<?php

namespace App\Model;

use App\model\Image;
use App\model\ProdImage;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
	protected $guarded = [];

	protected $table 		= "technology";

	protected $appends = ['product_img'];

	public function getProductImgAttribute() {
        $images = [];
        if(!empty($this->prod_img)) {
            foreach($this->prod_img as $key => $img) {
                $images[] = $img->image;
            }
        }

        return $images;
    }

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

	public function prod_img() {
        return $this->belongsToMany(Image::class, 'prod_images', 'prod_id', 'image_id');
    }
}
