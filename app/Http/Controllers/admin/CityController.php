<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\Country;
use App\model\City;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::get();
        $cities = City::get();
        $data = compact('countries', 'cities'); // Variable to array convert
        return view('backend.inc.city.city', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get();
        $cities = City::get();
        $data = compact('countries', 'cities'); // Variable to array convert
        return view('backend.inc.city.city', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'record.name' => 'required|string|unique:mysql.cities,name|max:255',
            'record.short_name' => 'required|string|max:5',
        ];

        $messages = [
            'record.name.required'   => 'City Name must be required.',
            'record.name.string'   => 'City Name contain only alphabets.',
            'record.name.unique'   => 'City Name must be unique.',
            'record.name.max'   => 'City Name must be max of 255 charcters.',
            'record.short_name.required'   => 'City Shortname Name must be required.',
            'record.short_name.string'   => 'City Shortname Name contain only alphabets.',
            'record.short_name.max'   => 'City Shortname Name must be max of 5 charcters.',
        ];

        $validator  = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {
            return redirect(route('city.create'))
                ->withErrors($validator->errors()->all())
                ->withInput();
        } else {
            $city = new City($request->record);

            $city->slug = Str::slug($request->record['name'], '-');

            $city->save();

            return redirect(route('city.index'))->with('success', 'City successfully added.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $countries = Country::get();
        $cities = City::get();
        $data = compact('countries', 'cities', 'city'); // Variable to array convert
        return view('backend.inc.city.city', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $rules = [
            'record.name' => 'required|string|max:255|unique:mysql.cities,name,' . $city->id,
            'record.short_name' => 'required|string|max:5'
        ];


        $messages = [
            'record.name.required'   => 'City Name must be required.',
            'record.name.string'   => 'City Name contain only alphabets.',
            'record.name.unique'   => 'City Name must be unique.',
            'record.name.max'   => 'City Name must be max of 255 charcters.',
            'record.short_name.required'   => 'City Shortname Name must be required.',
            'record.short_name.string'   => 'City Shortname Name contain only alphabets.',
            'record.short_name.max'   => 'City Shortname Name must be max of 5 charcters.',
        ];


        $validator  = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {
            return redirect(route('city.edit', $city->id))
                ->withErrors($validator->errors()->all())
                ->withInput();
        } else {
            $cities = $request->record;
    
            $city->update($cities);
    
            return redirect(route('city.index'))->with('success', 'City successfully Update.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect(route('city.index'))->with('success', 'City successfully Delete.');
    }
}
