<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admin.products.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $availablelocales = \Localization::getLocales();
        foreach ($availablelocales as $locale => $value){
            $product->translateOrNew($locale)->name = $request['name_'.$locale];
            $product->translateOrNew($locale)->description = $request['description_'.$locale];
            $product->translateOrNew($locale)->short_description = $request['short_description_'.$locale];
            $product->translateOrNew($locale)->pattern = $request['pattern_'.$locale];
            $product->translateOrNew($locale)->material = $request['material_'.$locale];
            $product->translateOrNew($locale)->size = $request['size_'.$locale];
        }//end for each
        if ($request->hasFile('thumbnail')) {
            $picture_name = 'uploads/' . time() . str_shuffle('abcdef') . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            Image::make($request->file('thumbnail'))->save(public_path("$picture_name"));
            $product->thumbnail = $picture_name;
        }
        $product->price_before = $request->price_before;
        $product->price_after = $request->price_after;
        $product->colors = $request->colors;
        $product->status = $request->status;
        $product->quantity = $request->quantity;
        $product->serial_number = $request->serial_number;
        $product->brand_id = $request->brand_id;
        $product->save();
        return redirect(route('products.index'));
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
        $brands = Brand::all();
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->deleteTranslations();
        $availablelocales = \Localization::getLocales();
        foreach ($availablelocales as $locale => $value){
            $product->translateOrNew($locale)->name = $request['name_'.$locale];
            $product->translateOrNew($locale)->description = $request['description_'.$locale];
            $product->translateOrNew($locale)->short_description = $request['short_description_'.$locale];
            $product->translateOrNew($locale)->pattern = $request['pattern_'.$locale];
            $product->translateOrNew($locale)->material = $request['material_'.$locale];
            $product->translateOrNew($locale)->size = $request['size_'.$locale];
        }//end for each
        if ($request->hasFile('thumbnail')) {
            $picture_name = 'uploads/' . time() . str_shuffle('abcdef') . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            Image::make($request->file('thumbnail'))->save(public_path("$picture_name"));
            $product->thumbnail = $picture_name;
        }
        $product->price_before = $request->price_before;
        $product->price_after = $request->price_after;
        $product->colors = $request->colors;
        $product->status = $request->status;
        $product->quantity = $request->quantity;
        $product->serial_number = $request->serial_number;
        $product->brand_id = $request->brand_id;
        $product->save();
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['success' => 'true']);
    }
}
