<?php

use App\Http\Controllers\Action\SearchController;
use App\Http\Controllers\Admin\Action\CategoryAdminActionController;
use App\Http\Controllers\Admin\Action\DepartmentAdminActionController;
use App\Http\Controllers\Admin\Action\MakerAdminActionController;
use App\Http\Controllers\Admin\Action\ProductAdminActionController;
use App\Http\Controllers\Admin\Action\PromoCodeAdminActionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/search/products', [SearchController::class, "product"])
    ->name("search.products");

Route::get('/department', [DepartmentAdminActionController::class, "index"])->middleware("cache.page")->name("department");
Route::get('/category', [CategoryAdminActionController::class, "index"])->middleware("cache.page")->name("category");
Route::get('/maker', [MakerAdminActionController::class, "index"])->middleware("cache.page")->name("maker");
Route::get('/promoCode', [PromoCodeAdminActionController::class, "index"])->middleware("cache.page")->name("promoCode");
Route::get('/product', [ProductAdminActionController::class, "index_sort"])->middleware("cache.page")->name("product_sort");
