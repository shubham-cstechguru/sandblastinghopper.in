<?php

namespace App\Http\Controllers;

use App\model\Technology;
use App\model\Category;
use App\model\Blog;


use Illuminate\Routing\Controller as BaseController;


class HomeController extends BaseController {
    public function index() {
    	
        $product = Technology::latest()->paginate(16);
        $category = Category::latest()->paginate(16);
        $blog = Blog::latest()->paginate(4);
        $data = compact('product','category','blog');
    	
    	return view('frontend.pages.home',$data);
    }
}