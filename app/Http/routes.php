<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::resource('user', 'UserController',
                ['only' => ['index', 'store', 'update', 'destroy', 'show']]);
                
        
                
Route::get('brand/models/{id}', 'BrandController@models');

Route::resource('brand', 'BrandController',
                ['only' => ['index', 'store', 'update', 'destroy', 'show',""]]);
Route::resource('model', 'ModelController',
                ['only' => ['index', 'store', 'update', 'destroy', 'show',""]]);
                
                
Route::get('get_car', 'CarController@getCar');                
Route::resource('car', 'CarController',
                ['only' => ['index', 'store', 'update', 'destroy', 'show',""]]);


Route::resource('category', 'CategoryController',
                ['only' => ['index', 'store', 'update', 'destroy', 'show',""]]);

Route::resource('image', 'ImageController',
                ['only' => ['index', 'store', 'update', 'destroy', 'show',""]]);
          Route::group(['middleware' => ['auth']],function(){                              
                
});
Route::group(['middleware' => ['auth']],function(){                              
    Route::get('/', function () {
        return view('welcome');
    });
});