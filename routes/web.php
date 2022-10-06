<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('login', [MainController::class, 'login'])->name('login');

Route::get('signup', [MainController::class, 'signup'])->name('signup');

Route::get('set_password', [MainController::class, 'set_password'])->name('set_password');

Route::post('update_password', [MainController::class, 'update_password'])->name('update_password');

Route::get('forgot_password', [MainController::class, 'forgot_password'])->name('forgot_password');

Route::post('send_link', [MainController::class, 'send_link'])->middleware('guest')->name('send_link');

Route::post('verify', [MainController::class, 'verify'])->name('verify');

Route::post('register', [MainController::class, 'register'])->name('register');

Route::middleware(['auth', 'SessionValidation'])->group(function () {

    Route::get('/', [MainController::class, 'authUser'])->name('authUser');
    Route::get('logout', [MainController::class, 'logout'])->name('logout');
    Route::get('main', [MainController::class, 'main'])->name('main');
    Route::get('main/product', [ProductController::class, 'product'])->name('product');
    Route::get('main/product/addproduct', [ProductController::class, 'addproduct'])->name('addproduct');
    Route::get('main/product/update_product', [ProductController::class, 'update_product'])->name('update_product');
    Route::get('main/product/deleteproduct', [ProductController::class, 'deleteproduct'])->name('deleteproduct');
    Route::post('main/product/editproduct', [ProductController::class, 'editproduct']);
    Route::post('main/product/addproduct/createproduct', [ProductController::class, 'createproduct'])->name('createproduct');
});
