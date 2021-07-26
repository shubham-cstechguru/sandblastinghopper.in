<?php

namespace App\Http\Controllers;


use App\model\Category;
use App\model\City;
use App\model\Country;
use App\model\Technology;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\URL;

class ProductController extends BaseController
{
    public function index(Request $request)
    {
        $category1   = Category::with(['product' => function ($q) {
            $q->where('prod_city', null)->where('prod_country', null);
        }])->has('product')->get();

        $product = Technology::where([['prod_city', '=', null], ['prod_country', '=', null]])->get();

        if ($request->ajax()) {
            $data = compact('category1');
            $products = view('frontend.templates.product', $data)->render();
        } else {
            $data = compact('product', 'category1');
            return view('frontend.pages.product', $data);
        }
    }

    public function filter(Request $request)
    {
        if(!empty(request('namec'))){
            if(request('namec') == 'city'){
                $product = Technology::where('prod_city', $request->name)->where('prod_country', null)->whereIn('parent', $request->search)->get();
                $name = City::findOrFail($request->name);
            } elseif(request('namec') == 'country') {
                $product = Technology::where('prod_city', null)->where('prod_country', $request->name)->whereIn('parent', $request->search)->get();
                $name = Country::findOrFail($request->name);
            } 
        } else {
            if(!empty(request('search'))){
                $product = Technology::where('prod_city', null)->where('prod_country', null)->whereIn('parent', $request->search)->get();   
                $name = null;
            } else {
                $product = Technology::where('prod_city', null)->where('prod_country', null)->get();
                $name = null;
            }
        }


        $products = view('frontend.templates.product', compact('product', 'name'))->render();

        return response()->json($products, 200);
    }
}
