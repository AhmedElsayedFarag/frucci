<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth','checkAdmin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', 'Admin\AdminController@index')->name('dashboard');

    //Questions Dashboard
    Route::resource('questions', 'Admin\QuestionController');

    //Sliders Dashboard
    Route::resource('sliders', 'Admin\SliderController');

    //Brands Dashboard
    Route::resource('brands', 'Admin\BrandController');

    //Countries-Cities Dashboard
    Route::resource('countries-cities', 'Admin\CountryCityController');

    //Categories Dashboard
    Route::resource('categories', 'Admin\CategoryController');

    //Products Dashboard
    Route::resource('products', 'Admin\ProductController');

    //Stores Dashboard
    Route::resource('stores', 'Admin\StoreController');

    //Users Dashboard
    Route::resource('users', 'Admin\UserController');

    //Packages Dashboard
    Route::resource('packages', 'Admin\PackageController');
});

Route::get('change_locale/{locale}', 'IndexController@change_locale')->name('change_locale');


Route::get('/', function () {
    $user=\Illuminate\Support\Facades\Auth::user();

    return view('welcome');
});

