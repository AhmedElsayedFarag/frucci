<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryCityRequest;
use Intervention\Image\Facades\Image;

class CountryCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::where('parent_id', '!=', 0)->get();
        $countries = City::where('parent_id', 0)->get();
        return view('admin.countries-cities.index', [
            'cities' =>$cities,
            'countries'=>$countries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = City::where('parent_id', 0)->get();
        return view('admin.countries-cities.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryCityRequest $request)
    {
        $countryCity = new City();
        $availablelocales = \Localization::getLocales();
        foreach ($availablelocales as $locale => $value){
            $countryCity->translateOrNew($locale)->name = $request['name_'.$locale];
        }//end for each
        $countryCity->parent_id = $request->parent_id;
        $countryCity->save();
        session()->flash('message', trans('sweet_alert.added_successfully'));
        return redirect(route('countries-cities.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = City::where('parent_id', 0)->get();
        $countryCity = City::findOrFail($id);
        return view('admin.countries-cities.edit', compact('countries', 'countryCity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryCityRequest $request, $id)
    {
        $countryCity = City::findOrFail($id);
        $countryCity->deleteTranslations();
        $available_locales = \Localization::getLocales();
        foreach ($available_locales as $locale => $value){
            $countryCity->translateOrNew($locale)->name = $request['name_'.$locale];
        }//end for each
        if ($request->parent_id){
            $countryCity->parent_id = $request->parent_id;
        }
        //$countryCity->save();
        if($countryCity->save()) {
            session()->flash('message', trans('sweet_alert.updated_successfully'));
        }
        return redirect(route('countries-cities.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        City::destroy($id);
        return response()->json(['success' => 'true']);
    }
}
