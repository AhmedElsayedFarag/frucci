<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Setting;
use App\SettingTranslation;
use Intervention\Image\Facades\Image;


class SettingController extends Controller
{
    public function index(){
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(SettingRequest $request)
    {
        $requestData = $request->all();
        if ($file = $request->hasFile('logo_header')) {
            $picture_name = 'uploads/' . time() . str_shuffle('abcdef') . '.' . $request->file('logo_header')->getClientOriginalExtension();
            Image::make($request->file('logo_header'))->save(public_path("$picture_name"));
            $requestData['logo_header'] = $picture_name;
        }
        if ($file = $request->hasFile('logo_footer')) {
            $picture_name = 'uploads/' . time() . str_shuffle('abcdef') . '.' . $request->file('logo_footer')->getClientOriginalExtension();
            Image::make($request->file('logo_footer'))->save(public_path("$picture_name"));
            $requestData['logo_footer'] = $picture_name;
        }
        foreach($requestData as $key=>$value)
        {
            $settings = Setting::where('key', $key)->get();
            foreach ($settings as $setting) {
                SettingTranslation::where('setting_id', $setting->id)->update(['value' => $value]);
            }
        }
            session()->flash('message', trans('sweet_alert.updated_successfully'));
            return back();
        }

}
