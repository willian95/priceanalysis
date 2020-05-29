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
Route::get('/post/show/{code}', "PostController@show");
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

Route::get("/profile", "ProfileController@index");

Route::get("/my-posts", "PostController@myPosts");
Route::get('/my-posts/fetch/{page}', "PostController@myPostsFetch");
Route::get("/my-posts/show/{id}", "PostController@showMyPost");


Route::get('/admin/dashboard', "DashboardController@index");

Route::get('/admin/category/index', "CategoryController@index");
Route::get('/admin/category/fetch/{page}', "CategoryController@fetch");
Route::post('/admin/category/store', "CategoryController@store");
Route::post('/admin/category/update', "CategoryController@update");
Route::post('/admin/category/delete', "CategoryController@delete");

Route::get("/admin/product/index", "ProductController@index");
Route::get("/admin/product/fetch/{page}", "ProductController@fetch");
Route::post('/admin/product/store', "ProductController@store");
Route::post('/admin/product/update', "ProductController@update");
Route::post('/admin/product/delete', "ProductController@delete");
Route::post('/product/search', "ProductController@search");

Route::get("/admin/unit/index", "UnitController@index");
Route::get("/admin/unit/fetch/{page}", "UnitController@fetch");
Route::post('/admin/unit/store', "UnitController@store");
Route::post('/admin/unit/update', "UnitController@update");
Route::post('/admin/unit/delete', "UnitController@delete");
Route::get("/unit/fetchAll", "UnitController@fetchAll");
Route::get("/product/unit/{product_id}", "UnitController@productUnit");

Route::get('/admin/user/index', "UserController@index");
Route::get('/admin/user/fetch/{page}', "UserController@fetch");
Route::post('/admin/user/confirmRif', "UserController@update");


Route::get("/admin/email/index", "AdminEmailController@index");
Route::get("/admin/email/fetch/{page}", "AdminEmailController@fetch");
Route::post('/admin/email/store', "AdminEmailController@store");
Route::post('/admin/email/update', "AdminEmailController@update");
Route::post('/admin/email/delete', "AdminEmailController@delete");

