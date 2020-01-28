<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductCategory;
use App\ProductImage;
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
        $categories = Category::where('parent_id', '!=', 0)->get();
        $brands = Brand::all();
        return view('admin.products.create', compact('brands', 'categories'));
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
        $product->colors = serialize($request->colors);
        $product->status = $request->status;
        $product->quantity = $request->quantity;
        $product->serial_number = $request->serial_number;
        $product->brand_id = $request->brand_id;
        $product->save();
        $images = array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $picture_name = 'uploads/' . time() . str_shuffle('abcdef') . '.' . $file->getClientOriginalExtension();
                Image::make($file)->save(public_path("$picture_name"));
                $images[]=$picture_name ;
            }
        }

        for ($x=0;$x<count($request->images);$x++){
            $image = new ProductImage();
            $image->product_id = $product->id;
            $image->image = $images[$x];
            $image->save();
        }
        for ($x=0;$x<count($request->cat_ids);$x++){
            $product_category = new ProductCategory();
            $product_category->product_id =  $product->id;
            $product_category->category_id = $request->cat_ids[$x];
            $product_category->save();
        }
        session()->flash('message', trans('sweet_alert.added_successfully'));
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
        $categories = Category::where('parent_id', '!=', 0)->get();
        $brands = Brand::all();
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product', 'brands', 'categories'));
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
        $images1 = array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $picture_name = 'uploads/' . time() . str_shuffle('abcdef') . '.' . $file->getClientOriginalExtension();
                Image::make($file)->save(public_path("$picture_name"));
                $images1[]=$picture_name ;
            }
        }
        $images = ProductImage::where('product_id', $product->id)->get();
        if(count($images1)) {
            foreach ($images as $image) {
                $image->delete();
            }//end foreach
            for ($x = 0; $x < count($request->images); $x++) {
                $image = new ProductImage();
                $image->product_id = $product->id;
                $image->image = $images1[$x];
                $image->save();
            }
        }
        $product_categories = ProductCategory::where('product_id',$product->id)->get();
        foreach ($product_categories as $category){
            $category->delete();
        }//end foreach
        for ($x=0;$x<count($request->cat_ids);$x++){
            $product_category = new ProductCategory();
            $product_category->product_id = $product->id;
            $product_category->category_id = $request->cat_ids[$x];
            $product_category->save();
        }
        session()->flash('message', trans('sweet_alert.updated_successfully'));

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
