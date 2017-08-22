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










 Route::get('/users','UserController@index')->middleware(AuthAdmin::class);; //admin

 Route::delete('/users/{id}','UserController@destroy')->middleware(AuthAdmin::class);; //admin

 Route::post('/users','UserController@updateAdmin')->middleware(AuthAdmin::class);; //admin

 Route::get('/categories','CategorieController@index')->middleware(AuthAdmin::class);; //admin

Route::post('/categories','CategorieController@store')->middleware(AuthAdmin::class);; //admin

Route::delete('/categories/{id}','CategorieController@destroy')->middleware(AuthAdmin::class);; //admin

Route::put('/categories/{id}','CategorieController@update')->middleware(AuthAdmin::class);; //admin

Route::get('/articles','ArticleController@index')->middleware(AuthAdmin::class);; //admin

Route::post('/articles','ArticleController@store')->middleware(AuthAdmin::class);; //admin

Route::delete('/articles/{id}','ArticleController@destroy')->middleware(AuthAdmin::class);; //admin

Route::put('/articles/{id}','ArticleController@update')->middleware(AuthAdmin::class);; //admin

Route::get('/create','PageController@create')->middleware(AuthAdmin::class);; //admin

Route::post('/pages','PageController@store')->middleware(AuthAdmin::class);; //admin

Route::get('/pages','PageController@index')->middleware(AuthAdmin::class);; //admin

Route::delete('/pages/{id}','PageController@destroy')->middleware(AuthAdmin::class);; //admin

Route::put('/pages/{id}','PageController@update')->middleware(AuthAdmin::class);; //admin

 

Route::get('/dashboardA', 'UserController@toAdmin')->middleware(AuthAdmin::class); //admin



Route::get('loginAdmin','UserController@loginAdmin');

Route::post('login-admin','UserController@loginAdminAuth');

Route::get('/articles/{title}','ArticleController@AfficheCategorie');

Route::get('/pages/{title}','PageController@AffichePage');




Route::post('/getArticlesAjax','ArticleController@getArticlesAjax');

Route::post('/getCategorieAjaxs','CategorieController@getCategorieAjax');

Route::post('/getArticleCategorieAjax','ArticleController@ArticleCategorieAjax');

Route::post('/subscribe','UserController@subscribe');



 