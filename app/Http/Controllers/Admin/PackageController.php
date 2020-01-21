<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Package;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.packages.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request)
    {
        $package = new Package();
        $availablelocales = \Localization::getLocales();
        foreach ($availablelocales as $locale => $value){
            $package->translateOrNew($locale)->name = $request['name_'.$locale];
        }//end for each
        if ($request->hasFile('image')) {
            $picture_name = 'uploads/'.time().str_shuffle('abcdef').'.'.$request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->save(public_path("$picture_name"));
            $package->image = $picture_name;
        }//end if
        $package->price = $request->price;
        $package->products()->attach($request->product_id);
        $package->save();
        return redirect(route('packages.index'));
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
        $products = Product::all();
        $package = Package::findOrFail($id);
        return view('admin.packages.edit', compact('products', 'package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PackageRequest $request, $id)
    {
        $package = Package::findOrFail($id);
        $package->deleteTranslations();
        $available_locales = \Localization::getLocales();
        foreach ($available_locales as $locale => $value){
            $package->translateOrNew($locale)->name = $request['name_'.$locale];
        }//end for each
        if ($request->hasFile('image')) {
            $picture_name = 'uploads/'.time().str_shuffle('abcdef').'.'.$request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->save(public_path("$picture_name"));
            $package->image = $picture_name;
        }//end if
        $package->products()->attach($request->product_id);
        $package->save();
        return redirect(route('packages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Package::destroy($id);
        return response()->json(['success' => 'true']);
    }
}
