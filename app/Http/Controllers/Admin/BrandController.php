<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $brand = new Brand();
        $availablelocales = \Localization::getLocales();
        foreach ($availablelocales as $locale => $value){
            $brand->translateOrNew($locale)->name = $request['name_'.$locale];
            $brand->translateOrNew($locale)->description = $request['description_'.$locale];
        }//end for each


        if ($request->hasFile('image')) {
            $picture_name = 'uploads/'.time().str_shuffle('abcdef').'.'.$request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->save(public_path("$picture_name"));
            $brand->image = $picture_name;
        }//end if
//        $originalImage = $request->file('image');$thumbnailImage = Image::make($originalImage);
//        $thumbnailPath = public_path().'/uploads/sliders/';
//        $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());
        $brand->save();
        return redirect(route('brands.index'));
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
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->deleteTranslations();
        $available_locales = \Localization::getLocales();
        foreach ($available_locales as $locale => $value){
            $brand->translateOrNew($locale)->name = $request['name_'.$locale];
            $brand->translateOrNew($locale)->description = $request['description_'.$locale];
        }//end for each
        if ($request->hasFile('image')) {
            $picture_name = 'uploads/'.time().str_shuffle('abcdef').'.'.$request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->save(public_path("$picture_name"));
            $brand->image = $picture_name;
        }//end if
//        $originalImage = $request->file('image');$thumbnailImage = Image::make($originalImage);
//        $thumbnailPath = public_path().'/uploads/sliders/';
//        $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());
        $brand->save();
        return redirect(route('brands.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::destroy($id);
        return response()->json(['success' => 'true']);
    }
}
