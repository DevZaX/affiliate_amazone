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
    return view('index');
});

Route::post('/', 'UserController@register');

Route::post('/login', 'UserController@login');

Route::post('/logout', 'UserController@logout');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboardA', 'UserController@toAdmin');


 Route::get('/users','UserController@index');

 Route::delete('/users/{id}','UserController@destroy');

 Route::post('/users','UserController@updateAdmin');

Route::post('/categories','CategorieController@store');

Route::get('/categories','CategorieController@index');


 