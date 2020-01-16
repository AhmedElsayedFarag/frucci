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

    //Countries Dashboard
    Route::resource('countries', 'Admin\CountryController');

    //Cities Dashboard
    Route::resource('cities', 'Admin\CityController');
});

Route::get('change_locale/{locale}', 'IndexController@change_locale')->name('change_locale');



