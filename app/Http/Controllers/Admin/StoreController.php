<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return view('admin.stores.index', compact('stores'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::where('parent_id', '!=', 0)->get();
        return view('admin.stores.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $store = new Store();
        $available_locales = \Localization::getLocales();
        foreach ($available_locales as $locale => $value){
            $store->translateOrNew($locale)->name = $request['name_'.$locale];
            $store->translateOrNew($locale)->address = $request['address_'.$locale];
            $store->translateOrNew($locale)->working_times = $request['working_times_'.$locale];
        }//end for each
        $store->lat = $request->lat;
        $store->long = $request->long;
        $store->phone = $request->phone;
        $store->city_id = $request->city_id;
        $store->save();
        session()->flash('message', trans('sweet_alert.added_successfully'));
        return redirect(route('stores.index'));
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
        $cities = City::where('parent_id', '!=', 0)->get();
        $store = Store::findOrFail($id);
        return view('admin.stores.edit', compact('store', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        $store = Store::findOrFail($id);
        $store->deleteTranslations();
        $available_locales = \Localization::getLocales();
        foreach ($available_locales as $locale => $value){
            $store->translateOrNew($locale)->name = $request['name_'.$locale];
            $store->translateOrNew($locale)->address = $request['address_'.$locale];
            $store->translateOrNew($locale)->working_times = $request['working_times_'.$locale];
        }//end for each
        $store->lat = $request->lat;
        $store->long = $request->long;
        $store->phone = $request->phone;
        $store->city_id = $request->city_id;
        //$store->save();
        if($store->save()) {
            session()->flash('message', trans('sweet_alert.updated_successfully'));
        }
        return redirect(route('stores.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Store::destroy($id);
        return response()->json(['success' => 'true']);
    }
}
