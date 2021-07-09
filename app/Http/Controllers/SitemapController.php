<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use illuminate\Http\Request;
use App\model\Technology;
use App\model\Category;
use App\model\Blog;


class SitemapController extends Controller{
    
    public function index(){
        $article  = Technology::all()->first();
        $category = Category::all()->first();
        $blog     = Blog::all()->first();
        return response()->view('sitemap.index',[
            'aticle'=> '$articles',
            'category'=>'$categories',
            'blog'=>'$blogs'
            ])->header('Content-Type','text/xml');
    }
    
    public function articles(){
        $articles = Technology::latest()->get();
        $data = compact('articles');
        return response()->view('sitemap.product',$data)->header('Content-Type','text/xml');
    }
    public function categories(){
        $category = Category::all();
        return response()->view('sitemap.category',[
            'category'=>$category
            ])->header('Content-Type','text/xml');
    }
    public function blogs(){
        $blog = Blog::all();
        $data = compact('blog');
        return response()->view('sitemap.blog',$data)->header('Content-Type','text/xml');
    }
    public function pages(){
        return response()->view('sitemap.page')->header('Content-Type','text/xml');
    }
}
?>