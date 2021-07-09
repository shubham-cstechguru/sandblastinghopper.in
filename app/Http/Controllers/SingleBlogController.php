<?php

namespace App\Http\Controllers;
use App\Model\Category;
use App\model\Blog;

use Illuminate\Routing\Controller as BaseController;

class SingleBlogController extends BaseController {
    public function index(Blog $slug) {
        $category1   = Category::with(['blog'])->has('blog')->get();
        
        
        $data = Blog::where('id','!=', $slug->id)->paginate(4)->toArray();
        $list = compact('slug','data','category1');
    	return view('frontend.pages.single-blog',$list);
    }
    public function single() {
        
        
        
        $data = Blog::latest()->paginate(10);
        $list = compact('data');
    	return view('frontend.pages.blog',$list);
    }
}
