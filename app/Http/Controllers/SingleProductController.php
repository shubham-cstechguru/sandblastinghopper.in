<?php

namespace App\Http\Controllers;

use App\model\Category;
use App\model\City;
use App\Model\Country;
use App\model\Technology;
use App\model\Faq;

use Illuminate\Routing\Controller as BaseController;

class SingleProductController extends BaseController
{
    public function index(Technology $slug)
    {
        if (empty($slug->prod_city) && empty($slug->prod_country)) {
            $category1   = Category::with(['product' => function ($q) {
                $q->where('prod_city', null)->where('prod_country', null);
            }])->has('product')->get();

            $faq   = Faq::where('parent', '=', $slug->parent)->get()->toArray();
            $data = Technology::where('id', '!=', $slug->id)->paginate(4)->toArray();
            $list = compact('slug', 'data', 'category1', 'faq');
            return view('frontend.pages.single-product', $list);
        } elseif(!empty($slug->prod_city) && empty($slug->prod_country)) {
            $city = City::findOrFail($slug->prod_city);
            return redirect(route('poductindexcity', ['city' => $city->slug, 'slug' => $slug->slug  ]));
        } elseif(empty($slug->prod_city) && !empty($slug->prod_country)) {
            $country = Country::findOrFail($slug->prod_country);
            return redirect(route('poductindexcountry', ['country' => $country->slug, 'slug' => $slug->slug  ]));
        }
    }


    public function productcity($city, Technology $slug)
    {
        $city = City::where('name', $city)->first();
        $category1   = Category::with(['product' => function ($q) use ($city) {
            $q->where('prod_city', 'LIKE', $city->id);
        }])->has('product')->get();

        $faq   = Faq::where('parent', '=', $slug->parent)->get()->toArray();
        $data = Technology::where('id', '!=', $slug->id)->paginate(4)->toArray();
        $list = compact('slug', 'data', 'category1', 'faq');
        return view('frontend.pages.single-product', $list);
    }

    public function productcountry($country, Technology $slug)
    {
        $country = Country::where('name', $country)->first();
        $category1   = Category::with(['product' => function ($q) use ($country) {
            $q->where('prod_country', 'LIKE', $country->id);
        }])->has('product')->get();

        $faq   = Faq::where('parent', '=', $slug->parent)->get()->toArray();
        $data = Technology::where('id', '!=', $slug->id)->paginate(4)->toArray();
        $list = compact('slug', 'data', 'category1', 'faq');
        return view('frontend.pages.single-product', $list);
    }
}
