<?php

define('PAGINATION_COUNT' , 4);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ProductsController;
//use LaravelLocalization;

// Auth::routes(['verify'=>true]);

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::post('change', 'HomeController@change')->name('change');

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect','localizationRedirect','localeViewPath' ,'middleware' => 'auth']], function(){

    Route::get('/home', 'HomeController@index')->name('home');

    // Route::resource('services', 'ServicesController')->except(['show']);
    Route::resource('contact', 'ContactController')->except(['show']);
    Route::resource('blog', 'BlogsController')->except(['show']);
    Route::resource('products', 'ProductsController')->except(['show']);


});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect','localizationRedirect','localeViewPath']]
    ,function()
    {
        Route::get('/', 'WelcomeController@index')->name('welcome');
        Route::post('client_store', 'WelcomeController@store')->name('client_store');
        Route::get('single{id}', 'WelcomeController@single')->name('single');
        Route::get('blogs', 'WelcomeController@blog')->name('blogs');
        
    });

    Route::get('test', function () {
        return view('single');

    });
