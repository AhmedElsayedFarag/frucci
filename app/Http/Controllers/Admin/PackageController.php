<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Package;
use App\PackageProduct;
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
        $package_products = PackageProduct::all();
        return view('admin.packages.index', compact('packages', 'package_products'));
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
        $package->save();

        for ($x=0;$x<count($request->product_ids);$x++){
            $package_product = new PackageProduct();
            $package_product->product_id = $request->product_ids[$x];
            $package_product->package_id = $package->id;
            $package_product->save();
        }

//        $package->products()->sync($request->product_id);
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

//        $package_product = PackageProduct::where('package_id', $id)->get();
        return view('admin.packages.edit', compact('package','products'));
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
        $package->save();
        for ($x=0;$x<count($request->product_ids);$x++){
            $package_product = new PackageProduct();
            $package_product->product_id = $request->product_ids[$x];
            $package_product->package_id = $package->id;
            $package_product->save();
        }
        //$package->products()->sync($request->product_id);
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
