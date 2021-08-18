<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
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


Route::prefix("cart")->group(function (){
    Route::get('/', [CartController::class, "index"]);
    Route::post('/add', [CartController::class, "addProduct"]);
});
