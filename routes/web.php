<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view("auth.login");
});

Route::get("/logout", [AuthenticatedSessionController::class, "destroy"])->name("auth.logout");
Route::get("/forgot-password", [PasswordResetLinkController::class, "create"])->name("auth.forgot-password");


// category
Route::get("/category/index", [CategoryController::class, "index"])->name("category.index");





///////////////////////////////////////////////////////////////////////////////////////////
//                                         Product                                       //
///////////////////////////////////////////////////////////////////////////////////////////

Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::patch('/product/update/{id}', [ProductController::class, 'update']);
