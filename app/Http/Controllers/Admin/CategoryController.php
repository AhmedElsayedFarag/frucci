<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id', 0)->get();
        $subCategories = Category::where('parent_id', '!=', 0)->get();
        return view('admin.categories.index', compact('categories','subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $availablelocales = \Localization::getLocales();
        foreach ($availablelocales as $locale => $value){
            $category->translateOrNew($locale)->name = $request['name_'.$locale];
        }//end for each
        if ($request->hasFile('image')) {
            $picture_name = 'uploads/' . time() . str_shuffle('abcdef') . '.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->save(public_path("$picture_name"));
            $category->image = $picture_name;
        }
        $category->parent_id = $request->parent_id;
        $category->save();
        session()->flash('message', trans('sweet_alert.added_successfully'));
        return redirect(route('categories.index'));
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
        $categories = Category::where('parent_id', 0)->get();
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->deleteTranslations();
        $available_locales = \Localization::getLocales();
        foreach ($available_locales as $locale => $value){
            $category->translateOrNew($locale)->name = $request['name_'.$locale];
        }//end for each
        if ($request->hasFile('image')) {
            $picture_name = 'uploads/' . time() . str_shuffle('abcdef') . '.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->save(public_path("$picture_name"));
            $category->image = $picture_name;
        }
        if ($request->parent_id||$request->parent_id=="0"){
            $category->parent_id = $request->parent_id;
        }
        if($category->save()) {
            session()->flash('message', trans('sweet_alert.updated_successfully'));
        }
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json(['success' => 'true']);
    }
}
