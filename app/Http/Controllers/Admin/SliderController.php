<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Slider;
use Intervention\Image\Facades\Image;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $slider = new Slider();
        $availablelocales = \Localization::getLocales();
        foreach ($availablelocales as $locale => $value){
            $slider->translateOrNew($locale)->head = $request['head_'.$locale];
            $slider->translateOrNew($locale)->link_title = $request['link_title_'.$locale];
        }//end for each
        $originalImage = $request->file('image');$thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path().'/uploads/sliders/';
        $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());
        $slider->save();
        return redirect(route('sliders.index'));
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
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->deleteTranslations();
        $available_locales = \Localization::getLocales();
        foreach ($available_locales as $locale => $value){
            $slider->translateOrNew($locale)->head = $request['head_'.$locale];
            $slider->translateOrNew($locale)->link_title = $request['link_title_'.$locale];
        }//end for each
        $slider->save();
        return redirect(route('sliders.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::destroy($id);
        return response()->json(['success' => 'true']);
    }
}