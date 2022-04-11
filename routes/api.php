<?php

use App\Http\Controllers\api\ApiAuthController;
use Illuminate\Http\Request;
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

});
