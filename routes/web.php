<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view("auth.login");
});

Route::get("/logout", [AuthenticatedSessionController::class, "destroy"])->name("auth.logout");
Route::get("/forgot-password", [PasswordResetLinkController::class, "create"])->name("auth.forgot-password");

Route::get("/category/create", [CategoryController::class, "create"])->name("category.create");
Route::post("/category/store", [CategoryController::class, "store"])->name("category.store");
// Route::middleware(["auth"])->group(function () {
    // category
    Route::get("/category/index", [CategoryController::class, "index"])->name("category.index");
    Route::get("/category/show/{id}", [CategoryController::class, "show"])->name("category.show");
    Route::get("/category/edit/{id}", [CategoryController::class, "edit"])->name("category.edit");
    Route::post("/category/update", [CategoryController::class, "update"])->name("category.update");
    Route::get("/category/destroy/{id}", [CategoryController::class, "destroy"])->name("category.destroy");
    // category
// });
///////////////////////////////////////////////////////////////////////////////////////////
//                                         Products                                       //
///////////////////////////////////////////////////////////////////////////////////////////
Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::patch('/product/update/{id}', [ProductController::class, 'update']);
///////////////////////////////////////////////////////////////////////////////////////////
//                                         Sellers                                       //
///////////////////////////////////////////////////////////////////////////////////////////
Route::get('/seller/index', [SellerController::class, 'index'])->name('seller.index');
Route::get('/seller/create', [SellerController::class, 'create']);
Route::post('/seller/store', [SellerController::class, 'store'])->name('seller.store');
Route::get('/seller/delete/{id}', [SellerController::class, 'destroy'])->name('seller.delete');
Route::get('/seller/edit/{id}', [SellerController::class, 'edit'])->name('seller.edit');
Route::patch('/seller/update/{id}', [SellerController::class, 'update']);
///////////////////////////////////////////////////////////////////////////////////////////
//                                         Orders                                         //
///////////////////////////////////////////////////////////////////////////////////////////
Route::get('orders/index', [OrderController::class, 'index'])->name('order.index');
Route::get('order/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
Route::patch('order/update/{id}', [OrderController::class, 'update'])->name('order.update');
