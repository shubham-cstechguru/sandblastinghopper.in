<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::get();
        $data = compact('countries'); // Variable to array convert
        return view('backend.inc.country.country', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get();
        $data = compact('countries'); // Variable to array convert
        return view('backend.inc.country.country', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input      = $request->get('record');
        $rules = [
            'record.name' => 'required|string|unique:mysql.countries,name|max:255',
            'record.code' => 'required|numeric|unique:mysql.countries,code|digits_between:1,5'
        ];

        $messages = [
            'record.name.required'   => 'Country Name must be required.',
            'record.name.string'   => 'Country Name contain only alphabets.',
            'record.name.unique'   => 'Country Name must be unique.',
            'record.name.max'   => 'Country Name must be max of 255 charcters.',
            'record.code.required'   => 'Country Code must be required.',
            'record.code.string'   => 'Country Code contain only numbers.',
            'record.code.unique'   => 'Country Code must be unique.',
            'record.code.digits_between'   => 'Country Code must be min of 1 & max of 4 Digits.',

        ];

        $validator  = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('country.create'))
                ->withErrors($validator->errors()->all())
                ->withInput();
        } else {
            $country = new Country($request->record);

            $country->slug = Str::slug($request->record['name'], '-');

            $country->save();

            return redirect(route('country.index'))->with('success', 'Country successfully added.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        $countries = Country::get();
        $data = compact('countries', 'country'); // Variable to array convert
        return view('backend.inc.country.country', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $rules = [
            'record.name' => 'required|string|max:255|unique:mysql.countries,name,' . $country->id,
            'record.code' => 'required|numeric|digits_between:1,5|unique:mysql.countries,code,' . $country->id,
        ];

        $messages = [
            'record.name.required'   => 'Country Name must be required.',
            'record.name.string'   => 'Country Name contain only alphabets.',
            'record.name.unique'   => 'Country Name must be unique.',
            'record.name.max'   => 'Country Name must be max of 255 charcters.',
            'record.code.required'   => 'Country Code must be required.',
            'record.code.string'   => 'Country Code contain only numbers.',
            'record.code.unique'   => 'Country Code must be unique.',
            'record.code.digits_between'   => 'Country Code must be min of 1 & max of 4 Digits.',

        ];

        $validator  = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {
            return redirect(route('country.edit', $country->id))
                ->withErrors($validator->errors()->all())
                ->withInput();
        } else {
            $countries = $request->record;

            $country->update($countries);

            return redirect(route('country.index'))->with('success', 'Country successfully Update.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect(route('country.index'))->with('success', 'Country successfully Delete.');
    }
}
