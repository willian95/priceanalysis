<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/post/fetch/{page}', "PostController@fetch");
Route::get('/post/show/{id}', "PostController@show");
Route::get('/post/product/{id}', "PostController@products");

Route::get("/category/fetchAll", "CategoryController@fetchAll");

Route::get('/businesses', "BusinessController@index");
Route::get('/businesses/fetch/{page}', "BusinessController@fetch");

Route::post("/offer/post/{id}", "OfferController@store");
Route::get("/offer/fetch/post/{id}/page/{page}", "OfferController@fetch");

Route::get('/login', "LoginController@index"); 
Route::post('/login', "LoginController@login");

Route::get('/logout', function(){
    \Auth::logout();
    return redirect()->to("/");
});

Route::get('/register', "RegisterController@index"); 
Route::post('/register', "RegisterController@register");

Route::get('/post/index', "PostController@index");
Route::post('/post/store', "PostController@store");

Route::get('/admin/dashboard', "DashboardController@index");

Route::get('/admin/category/index', "CategoryController@index");
Route::get('/admin/category/fetch/{page}', "CategoryController@fetch");
Route::post('/admin/category/store', "CategoryController@store");
Route::post('/admin/category/update', "CategoryController@update");
Route::post('/admin/category/delete', "CategoryController@delete");