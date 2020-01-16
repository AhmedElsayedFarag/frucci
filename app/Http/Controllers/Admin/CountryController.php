<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = City::where('parent_id', 0)->get();
        return view('admin.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = new City();
        $availablelocales = \Localization::getLocales();
        foreach ($availablelocales as $locale => $value){
            $country->translateOrNew($locale)->name = $request['name_'.$locale];
        }//end for each
        $country->save();
        return redirect(route('countries.index'));
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
        $country = City::findOrFail($id);
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $country = City::findOrFail($id);
        $country->deleteTranslations();
        $available_locales = \Localization::getLocales();
        foreach ($available_locales as $locale => $value){
            $country->translateOrNew($locale)->name = $request['name_'.$locale];
        }//end for each
        $country->save();
        return redirect(route('countries.index'));
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
