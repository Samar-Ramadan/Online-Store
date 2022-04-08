<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware'=>'auth'],function(){

    Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

    Route::get('/Categories/create','CategoriesController@create')->name('Categories.create');
    Route::post('/Categories/store','CategoriesController@store')->name('Categories.store');
    Route::get('/Categories/index','CategoriesController@index')->name('Categories.index');
    Route::get('/Categories/{category}/show','CategoriesController@show')->name('Categories.show');
    Route::DELETE('/Categories/{category}', 'CategoriesController@destroy')->name('Categories.destroy');
    Route::get('/Categories/{category}/edit', 'CategoriesController@edit')->name('Categories.edit');
    Route::POST('/Categories/{category}/update', 'CategoriesController@update')->name('Categories.update');
    
    
    Route::get('/Products/create','ProductController@create')->name('Products.create')->middleware('CheckCategory');
    Route::post('/Products/store','ProductController@store')->name('Products.store');
    Route::get('/Products/index','ProductController@index')->name('Products.index');
    Route::get('/Products/{product}/show','ProductController@show')->name('Products.show');
    Route::DELETE('/Products/{product}', 'ProductController@destroy')->name('Products.destroy');
    Route::get('/Products/{product}/edit', 'ProductController@edit')->name('Products.edit');
    Route::POST('/Products/{product}/update', 'ProductController@update')->name('Products.update');
    Route::get('/Products-trashed', 'ProductController@trashed')->name('Trashed.index');
    Route::get('/Products-trashed/{id}', 'ProductController@restore')->name('Trashed.restore');
});
 

Route::middleware(['auth','admin'])->group(function(){
    Route::post('/make-admin/{user}/create','UsersController@makeadmin')->name('make-admin');
    Route::post('/Users/store','UsersController@store')->name('Users.store');
    Route::get('/Users/index','UsersController@index')->name('Users.index');
});

//marketer