<?php
use App\Http\Middleware\AuthAdmin;

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

Route::get('/','FrontController@index');

Route::post('/', 'UserController@register');

Route::post('/login', 'UserController@check');

Route::post('/logout', 'UserController@logout');





Route::get('/home', 'HomeController@index')->name('home');




 Route::get('/users','UserController@index');

 Route::delete('/users/{id}','UserController@destroy');

 Route::post('/users','UserController@updateAdmin');

 Route::get('/categories','CategorieController@index');

Route::post('/categories','CategorieController@store');

Route::delete('/categories/{id}','CategorieController@destroy');

Route::put('/categories/{id}','CategorieController@update');

Route::get('/articles','ArticleController@index');

Route::post('/articles','ArticleController@store');

Route::delete('/articles/{id}','ArticleController@destroy');

Route::put('/articles/{id}','ArticleController@update');

Route::get('/create','PageController@create');

Route::post('/pages','PageController@store');

Route::get('/pages','PageController@index');

Route::delete('/pages/{id}','PageController@destroy');

Route::put('/pages/{id}','PageController@update');

 

Route::get('/dashboardA', 'UserController@toAdmin')->middleware(AuthAdmin::class);

Route::get('loginAdmin','UserController@loginAdmin');

Route::post('login-admin','UserController@loginAdminAuth');

Route::get('/articles/{title}','ArticleController@AfficheCategorie');

Route::get('/pages/{title}','PageController@AffichePage');

Route::post('/getArticlesAjax','ArticleController@getArticlesAjax');




 