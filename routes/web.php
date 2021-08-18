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

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/', [CatalogController::class, "index"])->name("index");


Route::get('/c/{departmentEName}/{categoryEName?}', [CatalogController::class, "index"])
    ->where('departmentEName', '[A-Za-z]+')
    ->where('categoryEName', '[A-Za-z]+')
    ->name("catalog.index");

Route::get('/p/{productID}', [ProductController::class, "index"])
    ->where('productID', '[1-9]+')
    ->name("product.index");

Route::prefix("cart")->name("cart.")->group(function (){
    Route::get('/', [CartController::class, "index"])->name("index");
    Route::post('/add', [CartController::class, "addProduct"])->name("add");
});

Route::prefix("43hgf36jfg")->name("admin.")->group(function (){
    Route::get('/', function (){
        return "FFF".Auth::guard("admin")->check();
    })->name("index")->middleware("auth:admin");

    Route::get('/login', [AdminController::class, "login"])->name("login.page");

    Route::post('/login', [AdminAuthController::class, "login"])->name("login");

    Route::get('/logout', [AdminAuthController::class, "logout"])->name("logout")->middleware("auth:admin");
});
