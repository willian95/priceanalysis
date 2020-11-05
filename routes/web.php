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

Route::get('/home', function () {
    return view('welcome');
})->middleware("auth");

Route::get("/import", "ExcelController@index");

Route::get('/post/fetch/{page}', "PostController@fetch")->middleware("auth");
Route::get('/post/show/{code}', "PostController@show")->middleware("auth");
Route::get('/post/product/{id}', "PostController@products")->middleware("auth");

Route::post("/search", "SearchController@search")->middleware("auth");

Route::get("/category/fetchAll", "CategoryController@fetchAll")->middleware("auth");

Route::get('/businesses', "BusinessController@index");
Route::get('/businesses/fetch/{page}', "BusinessController@fetch");

Route::post("/offer/post/{id}", "OfferController@store")->middleware("auth");
Route::get("/offer/fetch/post/{id}/page/{page}", "OfferController@fetch")->middleware("auth");

Route::get('/', "LoginController@index"); 
Route::post('/login', "LoginController@login");

Route::get('/logout', function(){
    \Auth::logout();
    return redirect()->to("/");
});

Route::get("/google/auth/login", "SocialAuthController@redirectGoogle");
Route::get("/google/auth/redirect", "SocialAuthController@googleCallback");

/*Route::get("test-get", function(){

    $products = App\Product::where("brand_id", 513)->get();

    echo "<table>";
        echo "<thead><tr><th>ID</th><th>Nombre</th></tr></thead>";
    foreach($products as $product){

        echo "<tr><td>".$product->id."</td><td>".$product->name."</td></tr>";

    }
    echo "</table>";

});*/

/*Route::get("xml", function(){

    ini_set('max_execution_time', 0)

    $xml=simplexml_load_file("inventario.xml");
    foreach($xml->Registro->Masubgrupos as $subgrupos){
        //dd($subgrupos);
        foreach($subgrupos->Maproductos as $productos){

            $product = new App\Product;
            $product->name = $productos->Descripcion_del_Producto;
            $product->brand_id = App\Brand::where("name", "TEST")->first()->id;
            $product->save();

        }
    }

});*/

Route::get('/register', "RegisterController@index"); 
Route::post('/register', "RegisterController@register");

Route::get('/post/index', "PostController@index")->middleware("auth");
Route::post('/post/store', "PostController@store")->middleware("auth");

Route::get('/brand/fetch/all', "BrandController@fetchAll")->middleware("auth");

Route::get("/profile", "ProfileController@index")->middleware("auth");

Route::get("/my-posts", "PostController@myPosts")->middleware("auth");
Route::get('/my-posts/fetch/{page}', "PostController@myPostsFetch")->middleware("auth");
Route::get("/my-posts/show/{id}", "PostController@showMyPost")->middleware("auth");

Route::get("/my-offers/index", "OfferController@index")->middleware("auth");
Route::get("/my-offers/fetch/{page}", "OfferController@fetchMyOffers")->middleware("auth");
Route::get("/my-offers/show/{id}", "OfferController@show")->middleware("auth");
Route::get("/my-offers/show/{id}/page/{page}", "OfferController@showMyOffers")->middleware("auth");
Route::get("/my-offers/fetch/post/{id}/page/{page}", "OfferController@myOffersFetch")->middleware("auth");

Route::get("/country/fetch", "CountryController@fetch")->middleware("auth");

Route::post("/user/general-data/update", "UserController@updateGeneralData")->middleware("auth");
Route::post("/user/comercial-activity/update", "UserController@updateCommercialActivity")->middleware("auth");
Route::post("/user/contact-info/update", "UserController@updateContactInfo")->middleware("auth");
Route::post("/user/other-info/update", "UserController@updateOtherInfo")->middleware("auth");
Route::get("/user/countries-info/fetch", "UserController@fetchComercialCountries")->middleware("auth");

Route::post("user/verify-me", "UserController@updateVerifyMyUser")->middleware("auth");

Route::get("validate/account/{code}", "RegisterController@validateAccount")->middleware("auth");

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
Route::post('/admin/product/search', "ProductController@adminSearch");
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
Route::post('/admin/user/confirmRif', "UserController@confirmRif");

Route::get("/admin/email/index", "AdminEmailController@index");
Route::get("/admin/email/fetch/{page}", "AdminEmailController@fetch");
Route::post('/admin/email/store', "AdminEmailController@store");
Route::post('/admin/email/update', "AdminEmailController@update");
Route::post('/admin/email/delete', "AdminEmailController@delete");

Route::get("/admin/verify-user/index", "VerifyUserController@index");
Route::get("/admin/verify-user/fetch/{page}", "VerifyUserController@fetch");
Route::get("/admin/verify-user/show/{id}", "VerifyUserController@show");
Route::get("/admin/verify-info/countries-info/fetch/{id}", "VerifyUserController@countryFetch");
Route::post("/admin/verify-info/verify/{id}", "VerifyUserController@verify");

Route::get('/admin/brand/index', "BrandController@index");
Route::get('/admin/brand/fetch/{page}', "BrandController@fetch");
Route::post('/admin/brand/store', "BrandController@store");
Route::post('/admin/brand/update', "BrandController@update");
Route::post('/admin/brand/delete', "BrandController@delete");
Route::post('/admin/brand/search', "BrandController@adminSearch");

Route::get("/admin/post/index", "PostController@adminIndex");
Route::get("/admin/post/fetch/{page}", "PostController@adminFetch");
Route::post("/admin/post/delete", "PostController@adminDelete");