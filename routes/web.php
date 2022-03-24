<?php

use App\Http\Controllers\Action\CartActionController;
use App\Http\Controllers\Action\SearchController;
use App\Http\Controllers\Admin\Action\CategoryAdminActionController;
use App\Http\Controllers\Admin\Action\DepartmentAdminActionController;
use App\Http\Controllers\Admin\Action\MakerAdminActionController;
use App\Http\Controllers\Admin\Action\OrderAdminActionController;
use App\Http\Controllers\Admin\Action\ProductAdminActionController;
use App\Http\Controllers\Admin\Action\PromoCodeAdminActionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\MakerAdminController;
use App\Http\Controllers\Admin\DepartmentAdminController;

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

Route::get('/', function (Request $request) {
    return view("index", ["departments" => \App\Models\Department::all(),"popular" => Product::getPopular(25)]);
})->middleware("cache.page")->name("index");

Route::get('/custom', function (Request $request) {
    return view("custom", ["departments" => \App\Models\Department::all()]);
})->name("custom");

Route::get('/info', function () {
    return view('info');
})->name("info");

Route::get('/c/{department:e_name}/{category:e_name?}', [CatalogController::class, "index"])
    ->middleware("cache.page")
    ->where('department', '[A-Za-z|_0-9]+')
    ->where('category', '[A-Za-z|_0-9]+')
    ->name("catalog.index");

Route::get('/p/{product:id}', [ProductController::class, "index"])
    ->middleware("cache.page")
    ->where('product', '[1-9]+')
    ->name("product.details");

Route::get('/cart', [CartController::class, "index"])->name("cart.index");

Route::prefix("action")->group(function () {

    Route::post("/callback-form", [CartActionController::class, "callbackForm"])->middleware("throttle:cart");

    Route::post('/searchPromoCode', [PromoCodeAdminActionController::class, "search"])->name("promoCode.search");

    Route::prefix("cart")->name("cart.")->group(function () {
        Route::post('/add', [CartActionController::class, "addProduct"])->name("add");
        Route::post('/del', [CartActionController::class, "delProduct"])->name("del");
        Route::post('/info', [CartActionController::class, "info"])->name("info");
        Route::post('/send', [CartActionController::class, "send"])->middleware("throttle:cart")->name("send");
        Route::post('/send-custom', [CartActionController::class, "sendCustom"])->middleware("throttle:cart")->name("send.custom");
    });

    Route::middleware("auth:admin")->group(function () {
        Route::apiResource("department", DepartmentAdminActionController::class)->missing(
            fn() => response()->json(["message" => "No query results for model \"Department\""], 404)
        );

        Route::apiResource("category", CategoryAdminActionController::class)->missing(
            fn() => response()->json(["message" => "No query results for model \"Category\""], 404)
        );

        Route::apiResource("product", ProductAdminActionController::class)->missing(
            fn() => response()->json(["message" => "No query results for model \"Product\""], 404)
        );

        Route::apiResource("maker", MakerAdminActionController::class)->missing(
            fn() => response()->json(["message" => "No query results for model \"Maker\""], 404)
        );

        Route::apiResource("promoCode", PromoCodeAdminActionController::class)->missing(
            fn() => response()->json(["message" => "No query results for model \"Maker\""], 404)
        );

        Route::apiResource("order", OrderAdminActionController::class)
            ->only(['index', 'show'])->missing(
                fn() => response()->json(["message" => "No query results for model \"Order\""], 404)
            );
    });
});

Route::prefix("43hgf36jfg")->name("admin.")->group(function () {
    Route::get('/login', [AdminController::class, "login"])->name("login.page")->middleware("guest");
    Route::post('/login', [AdminAuthController::class, "login"])->name("login")->middleware("guest");
    Route::get('/logout', [AdminAuthController::class, "logout"])->name("logout")->middleware("auth:admin");
});

Route::prefix("admin")->name("admin.")->middleware("auth:admin")->group(function () {
    Route::get('/departments', [DepartmentAdminController::class, 'index'])->name("departments");

    Route::get('/products', [ProductAdminController::class, 'index'])->name("products");

    Route::get('/categories', [CategoryAdminController::class, 'index'])->name("categories");

    Route::get('/makers', [MakerAdminController::class, 'index'])->name("makers");

    Route::get('/', [ProductAdminController::class, 'index'])->name("index");
});

Route::get('/orders', function () {
    return view('admin.orders');
})->middleware("auth:admin");
Route::get('/charts', function () {
    return view('admin.charts');
})->middleware("auth:admin");
Route::get('/main-info', function () {
    return view('admin.main-info');
})->middleware("auth:admin");
