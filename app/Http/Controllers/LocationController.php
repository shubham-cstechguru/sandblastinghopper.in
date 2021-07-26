<?php

namespace App\Http\Controllers;

use App\model\Category;
use App\model\City;
use App\model\Country;
use App\model\Technology;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function city(Request $request, $slug)
    {
        $id = City::where('slug', $slug)->select('id', 'name')->first();

        if (!empty($id)) {
            $category1   = Category::with(['product' => function ($q) {
                $q->whereNotNull('prod_city')->where('prod_country', null);
            }])->has('product')->get();

            $product = Technology::where('prod_city', $id->id)->get();

            $name = $id;

            $c = 'city';

            if ($request->ajax()) {
                $data = compact('category1', 'name');
                $products = view('frontend.templates.product', $data)->render();
            } else {
                $data = compact('category1', 'product', 'name', 'c');
                return view('frontend.pages.product', $data);
            }
        } else {
            return redirect()->back();
        }
    }

    public function country(Request $request, $slug)
    {
        $id = Country::where('slug', $slug)->select('id', 'name')->first();

        if (!empty($id)) {
            $category1   = Category::with(['product' => function ($q) {
                $q->where('prod_city', null)->whereNotNull('prod_country');
            }])->has('product')->get();

            $product = Technology::where('prod_country', $id->id)->get();
            
            $name = $id;

            $c = 'country';

            if ($request->ajax()) {
                $data = compact('category1', 'name');
                $products = view('frontend.templates.product', $data)->render();
            } else {
                $data = compact('category1', 'product', 'name', 'c');
                return view('frontend.pages.product', $data);
            }


        } else {
            return redirect()->back();
        }
    }
}
