<?php

use App\Http\Controllers\BusinessdataController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;

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
    Route::get('users', [UserController::class, 'users'])->name('users');

    // --------------------------------------------Business--------------------------------------------------------

    Route::get('business', [BusinessdataController::class, 'business'])->name('business');

    Route::get('business/create', [BusinessdataController::class, 'add'])->name('business.add');
    Route::post('business/create/verify', [BusinessdataController::class, 'verify'])->name('business.verify');

    Route::get('business/edit', [BusinessdataController::class, 'update'])->name('business.update');
    Route::post('business/edit/verify', [BusinessdataController::class, 'update_verify'])->name('business.update.verify');

    Route::get('business/delete', [BusinessdataController::class, 'delete'])->name('business.delete');

    // --------------------------------------------Locations--------------------------------------------------------

    Route::get('location', [LocationController::class, 'location'])->name('location');

    Route::get('location/create', [LocationController::class, 'add'])->name('location.add');
    Route::post('location/create/verify', [LocationController::class, 'verify'])->name('location.verify');

    Route::get('location/edit', [LocationController::class, 'update'])->name('location.update');
    Route::post('location/edit/verify', [LocationController::class, 'update_verify'])->name('location.update.verify');

    Route::get('location/delete', [LocationController::class, 'delete'])->name('location.delete');
});
