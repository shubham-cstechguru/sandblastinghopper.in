<?php

namespace App\Http\Controllers;
use App\model\Category;
use App\model\Technology;
use App\model\Faq;
use App\model\City;

use Illuminate\Routing\Controller as BaseController;

class SingleProductController extends BaseController {
    
    public function index(Technology $slug) {
        
        $faq   = Faq::where('parent','=', $slug->parent)->get()->toArray();
        $category1   = Category::with(['product'])->has('product')->get();
        // $city = City::latest()->paginate(10);
        // $city_name = City::select('slug')->get();
        
        $data = Technology::where('id','!=', $slug->id)->paginate(5)->toArray();
        $list = compact('slug','data','category1','faq');
    	return view('frontend.pages.single-product',$list);
    }
}
