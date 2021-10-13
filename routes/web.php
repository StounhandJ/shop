<?php

use App\Http\Controllers\Action\CartActionController;
use App\Http\Controllers\Action\SearchController;
use App\Http\Controllers\Admin\Action\CategoryAdminActionController;
use App\Http\Controllers\Admin\Action\DepartmentAdminActionController;
use App\Http\Controllers\Admin\Action\MakerAdminActionController;
use App\Http\Controllers\Admin\Action\OrderAdminActionController;
use App\Http\Controllers\Admin\Action\ProductAdminActionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
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
    return redirect(\route("catalog.index", ["department"=>\App\Models\Department::getFirst()->getEname()]));
//    return view("index", ["departments" => \App\Models\Department::all()]);
})->name("index");

Route::get('/custom', function (Request $request) {
    return view("custom", ["departments" => \App\Models\Department::all()]);
})->name("custom");

Route::get('/c/{department:e_name}/{category:e_name?}', [CatalogController::class, "index"])
    ->where('department', '[A-Za-z|_]+')
    ->where('category', '[A-Za-z|_]+')
    ->name("catalog.index");

Route::get('/p/{product:id}', [ProductController::class, "index"])
    ->where('product', '[1-9]+')
    ->name("product.details");

Route::get('/cart', [CartController::class, "index"])->name("cart.index");

Route::prefix("action")->group(function () {
    Route::get('/search/products', [SearchController::class, "product"])
        ->name("search.products");

    Route::post("/callback-form", [CartActionController::class, "callbackForm"]);

    Route::prefix("cart")->name("cart.")->group(function () {
        Route::post('/add', [CartActionController::class, "addProduct"])->name("add");
        Route::post('/del', [CartActionController::class, "delProduct"])->name("del");
        Route::post('/info', [CartActionController::class, "info"])->name("info");
        Route::post('/send', [CartActionController::class, "send"])->name("send");
        Route::post('/send-custom', [CartActionController::class, "sendCustom"])->name("send.custom");
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
