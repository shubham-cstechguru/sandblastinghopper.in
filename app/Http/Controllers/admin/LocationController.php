<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\City;
use App\model\Country;
use App\model\Technology;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function city(Request $request, $id)
    {
        $cities = $request->city;

        $productInfo = Technology::findOrFail($id)->toArray();
        // $productInfo = Technology::findOrFail($id);

        if (!empty($cities)) {
            foreach ($cities as $city) {
                $cityInfo = City::select('slug', 'name')->find($city);
                $arr = $productInfo;
                unset($arr['id']);

                $slug = $arr['slug'] . "-in-" . $cityInfo->slug;

                $is_exists = Technology::where('slug', 'LIKE', $slug)->count();

                if (!$is_exists) {
                    $arr['prod_city'] = $city;
                    $arr['slug'] .= "-in-" . $cityInfo->slug;
                    $arr['title'] .= " in " . $cityInfo->name;

                    $product = new Technology($arr);
                    $product->save();
                }
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function country(Request $request, $id)
    {
        $countries = $request->country;

        $productInfo = Technology::findOrFail($id)->toArray();
        // $productInfo = Technology::findOrFail($id);

        if (!empty($countries)) {
            foreach ($countries as $country) {
                $cityInfo = Country::select('slug', 'name')->find($country);
                $arr = $productInfo;
                unset($arr['id']);

                $slug = $arr['slug'] . "-in-" . $cityInfo->slug;

                $is_exists = Technology::where('slug', 'LIKE', $slug)->count();

                if (!$is_exists) {
                    $arr['prod_country'] = $country;
                    $arr['slug'] .= "-in-" . $cityInfo->slug;
                    $arr['title'] .= " in " . $cityInfo->name;

                    $product = new Technology($arr);
                    $product->save();
                }
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }

    }
}
