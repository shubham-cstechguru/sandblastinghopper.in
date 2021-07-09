<?php

namespace App\Http\Controllers;


use App\model\Category;
use App\model\Blog;


use Illuminate\Routing\Controller as BaseController;


class BlogController extends BaseController {
    public function index() {
    	
        
        $blog = Blog::latest()->paginate(16);
        $data = compact('blog');
    	
    	return view('frontend.pages.blog',$data);
    }
}