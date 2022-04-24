<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\api\SellerController;
use App\Http\Controllers\api\ApiAuthController;
use App\Http\Controllers\api\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


});

Route::post("/register", [ApiAuthController::class, "register"]);
// login
Route::post("/login", [ApiAuthController::class, "login"]);
// register
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
    Route::post('cart/delete/{id}', [CartController::class, 'delete']);
    // user cart
    Route::get('cart/view/{id}', [CartController::class, 'userCart']);

    /////////////////// category ///////////////////
    // show all category
    Route::get("/category/index", [ApiCategoryController::class, "index"])->name("api.category.index");
    // add new category
    Route::post("/category/store", [ApiCategoryController::class, "store"])->name("api.category.store");
    // show one category
    Route::get("/category/show/{id}", [ApiCategoryController::class, "show"])->name("api.category.show");
    // update one category
    Route::post("/category/update/{id}", [ApiCategoryController::class, "update"])->name("api.category.update");
    // destroy one category
Route::get("/category/destroy/{id}", [ApiCategoryController::class, "destroy"])->name("api.category.destroy");
/////////////////// category ///////////////////
});

///////////////////////////////////////////////////////////////////////////////////////////
//                                         Product                                       //
///////////////////////////////////////////////////////////////////////////////////////////
Route::get('product/index',[ProductController::class, 'index']);
Route::get('product/{id}', [ProductController::class,'show']);

///////////////////////////////////////////////////////////////////////////////////////////
//                                         Seller                                        //
///////////////////////////////////////////////////////////////////////////////////////////
Route::get('seller/index',[SellerController::class, 'index']);
Route::get('seller_prod/{id}', [SellerController::class,'seller_prod']);


