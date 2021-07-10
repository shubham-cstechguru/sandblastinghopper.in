<?php

namespace App\Http\Controllers;


use App\model\Category;
use App\model\Technology;


use Illuminate\Routing\Controller as BaseController;


class ProductController extends BaseController {
    public function index() {
    	
        
        $product = Technology::where([['prod_city', '=', null], ['prod_country', '=', null]])->latest()->paginate(12);
        $data = compact('product');
    	
    	return view('frontend.pages.product',$data);
    }
}