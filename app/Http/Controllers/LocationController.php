<?php

namespace App\Http\Controllers;

use App\model\City;
use App\model\Country;
use App\model\Technology;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function city($slug)
    {
        $id = City::where('slug', $slug)->select('id', 'name')->first();

        if (!empty($id)) {
            $product = Technology::where('prod_city', $id->id)->latest()->paginate(12);

            $name = $id->name;
            $data = compact('product', 'name');

            return view('frontend.pages.product', $data);
        } else {
            return redirect()->back();
        }
    }

    public function country($slug)
    {
        $id = Country::where('slug', $slug)->select('id', 'name')->first();

        if (!empty($id)) {
            $product = Technology::where('prod_country', $id->id)->latest()->paginate(12);

            $name = $id->name;
            $data = compact('product', 'name');

            return view('frontend.pages.product', $data);
        } else {
            return redirect()->back();
        }
    }
}
