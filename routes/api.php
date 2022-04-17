<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

// register
Route::post("/register", [ApiAuthController::class, "register"]);
// login
Route::post("/login", [ApiAuthController::class, "login"]);
// forgot_password
Route::post("/forgot_password", [ApiAuthController::class, "forgot_password"]);

Route::group(["middleware" => ["auth:sanctum"]], function(){

    // logout
    Route::get("/logout", [ApiAuthController::class, "logout"]);

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
