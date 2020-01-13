<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\App;

class IndexController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function change_locale($locale){
        session(['locale'=>$locale]);

            return redirect()->back();
    }//end change_locale
}
