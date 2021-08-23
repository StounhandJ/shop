<?php

use App\Http\Controllers\Action\CartActionController;
use App\Http\Controllers\Action\SearchController;
use App\Http\Controllers\Admin\Action\CategoryAdminActionController;
use App\Http\Controllers\Admin\Action\DepartmentAdminActionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function (){
    return view("layouts.structure", ["departments"=>\App\Models\Department::all()]);
})->name("index");


Route::get('/c/{department:e_name}/{category:e_name?}', [CatalogController::class, "index"])
    ->where('department', '[A-Za-z]+')
    ->where('category', '[A-Za-z]+')
    ->name("catalog.index");

Route::get('/p/{product:id}', [ProductController::class, "index"])
    ->where('product', '[1-9]+')
    ->name("product.index");

Route::get('/cart', [CartController::class, "index"])->name("cart.index");

Route::prefix("action")->group(function (){

    Route::get('/search/products', [SearchController::class, "product"])
        ->name("search.products");

    Route::prefix("cart")->name("cart.")->group(function (){
        Route::post('/add', [CartActionController::class, "addProduct"])->name("add");
        Route::post('/del', [CartActionController::class, "delProduct"])->name("del");
        Route::post('/info', [CartActionController::class, "info"])->name("info");
    });
});

Route::prefix("43hgf36jfg")->name("admin.")->group(function (){
    Route::get('/', function (){
        return "Index page for admin";
    })->name("index")->middleware("auth:admin");

    Route::get('/login', [AdminController::class, "login"])->name("login.page");
    Route::post('/login', [AdminAuthController::class, "login"])->name("login");
    Route::get('/logout', [AdminAuthController::class, "logout"])->name("logout")->middleware("auth:admin");

    Route::apiResource("department", DepartmentAdminActionController::class)->missing(fn() => response()->json(["message"=>"No query results for model \"Department\""], 404));

    Route::apiResource("category", CategoryAdminActionController::class)->missing(fn() => response()->json(["message"=>"No query results for model \"Category\""], 404));

    Route::apiResource("product", CategoryAdminActionController::class)->missing(fn() => response()->json(["message"=>"No query results for model \"Product\""], 404));
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
