<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\SellerController;
use App\Http\Controllers\api\ApiAuthController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ApiCategoryController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// register
Route::post("/register", [ApiAuthController::class, "register"]);
// login
Route::post("/login", [ApiAuthController::class, "login"]);
// forgot_password
Route::post("/forgot_password", [ApiAuthController::class, "forgot_password"]);

Route::group(["middleware" => ["auth:sanctum"]], function(){

    // logout
    Route::get("/logout", [ApiAuthController::class, "logout"]);
    //add to cart
    Route::post('addToCart', [CartController::class, 'addToCart']);
    //update cart
    Route::post('cart/update', [CartController::class, 'update']);
    //delete cart
    Route::post('cart/delete', [CartController::class, 'delete']);
    // user cart
    Route::get('cart/view', [CartController::class, 'userCart']);
    // Order Checkout
    Route::post('order/store', [OrderController::class, 'store']);
    Route::get('order/index', [OrderController::class, 'index']);
    /////////////////// category ///////////////////
    // show all category
    Route::get("/category/index", [ApiCategoryController::class, "index"])->name("api.category.index");

    Route::get("/category/show/{id}", [ApiCategoryController::class, "show"])->name("api.category.show");
    /////////////////// category ///////////////////
});

///////////////////////////////////////////////////////////////////////////////////////////
//                                        Products                                       //
///////////////////////////////////////////////////////////////////////////////////////////
Route::get('product/index',[ProductController::class, 'index']);
Route::get('product/{id}', [ProductController::class,'show']);

///////////////////////////////////////////////////////////////////////////////////////////
//                                        Sellers                                        //
///////////////////////////////////////////////////////////////////////////////////////////
Route::get('seller/index',[SellerController::class, 'index']);
Route::get('seller_prod/{id}', [SellerController::class,'seller_prod']);
Route::get('seller_prod', [SellerController::class,'sellerProducts']);

///////////////////////////////////////////////////////////////////////////////////////////
//                                         Orders                                        //
///////////////////////////////////////////////////////////////////////////////////////////
Route::get('category/view/{id}',[CategoryController::class, 'relatedProducts']);


