<?php

namespace App\Http\Controllers;

use App\model\Technology;
use App\model\Category;
use App\model\Setting;


use Illuminate\Routing\Controller as BaseController;


class ContactController extends BaseController {
    public function index() {
    	
        $product = Technology::latest()->paginate(16);
        $category = Category::latest()->paginate(16);
        $setting = Setting::findOrFail(1);
        $data = compact('product','category','setting');
    	
    	return view('frontend.pages.contact',$data);
    }
}