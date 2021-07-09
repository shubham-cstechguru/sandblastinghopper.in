<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;

use App\model\Blog;

class BlogController extends BaseController {
    public function index() {
        $blog = Blog::latest()->paginate(16);
        
        $data = compact('blog');
    	return view('frontend.pages.blog',$data);
    }
}