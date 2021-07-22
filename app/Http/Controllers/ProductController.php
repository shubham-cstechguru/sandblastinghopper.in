<?php

namespace App\Http\Controllers;


use App\model\Category;
use App\model\Technology;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;


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
        if(!empty(request('search'))){
            $product = Technology::where('prod_city', null)->where('prod_country', null)->whereIn('parent', $request->search)->get();     
        } else {
            $product = Technology::where('prod_city', null)->where('prod_country', null)->get();
        }


        $products = view('frontend.templates.product', compact('product'))->render();

        return response()->json($products, 200);
    }
}
