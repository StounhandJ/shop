<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/index', function () {
    return view('index');
});
Route::get('/product-details', function () {
    return view('product-details');
});
Route::get('/404', function () {
    return view('404');
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/contact-us', function () {
    return view('contact-us');
});
Route::get('/shop', function () {
    return view('shop');
});
Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/', [CatalogController::class, "index"])->name("index");


Route::get('/c/{departmentEName}/{categoryEName?}', [CatalogController::class, "index"])
    ->where('departmentEName', '[A-Za-z]+')
    ->where('categoryEName', '[A-Za-z]+')
    ->name("catalog.index");

Route::get('/p/{productID}', [ProductController::class, "index"])
    ->where('productID', '[1-9]+')
    ->name("product.index");

Route::get('/search/products', [ProductController::class, "search"])
    ->name("search.products");

Route::prefix("cart")->name("cart.")->group(function (){
    Route::get('/', [CartController::class, "index"])->name("index");
    Route::post('/add', [CartController::class, "addProduct"])->name("add");
    Route::get('/del', [CartController::class, "delProduct"])->name("del");
    Route::post('/info', [CartController::class, "info"])->name("info");
});

Route::prefix("43hgf36jfg")->name("admin.")->group(function (){
    Route::get('/', function (){
        return "Index page for admin";
    })->name("index")->middleware("auth:admin");

    Route::get('/login', [AdminController::class, "login"])->name("login.page");
    Route::post('/login', [AdminAuthController::class, "login"])->name("login");
    Route::get('/logout', [AdminAuthController::class, "logout"])->name("logout")->middleware("auth:admin");

//    Route::prefix("/department")->name("department.")->middleware("auth:admin")->group(function (){
//        Route::get('/create', [...Controller::class, "create"])->name("create");
//        Route::get('/department/change', [...Controller::class, "change"])->name("change");
//        Route::get('/department/delete', [...Controller::class, "delete"])->name("delete");
//    });
//
//    Route::prefix("/category")->name("category.")->middleware("auth:admin")->group(function (){
//        Route::get('/create', [...Controller::class, "create"])->name("create");
//        Route::get('/change', [...Controller::class, "change"])->name("change");
//        Route::get('/delete', [...Controller::class, "delete"])->name("delete");
//    });
//
//    Route::prefix("/product")->name("product.")->middleware("auth:admin")->group(function (){
//        Route::get('/create', [...Controller::class, "create"])->name("create");
//        Route::get('/change', [...Controller::class, "change"])->name("change");
//        Route::get('/delete', [...Controller::class, "delete"])->name("delete");
//    });
//
//    Route::prefix("/maker")->name("maker.")->middleware("auth:admin")->group(function (){
//        Route::get('/create', [...Controller::class, "create"])->name("create");
//        Route::get('/change', [...Controller::class, "change"])->name("change");
//        Route::get('/delete', [...Controller::class, "delete"])->name("delete");
//    });
});
