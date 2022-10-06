<?php

use App\Http\Controllers\BusinessdataController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

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

// Route::get('helper', function () {
//     if (check(1, 'add business')) {
//         dd('add business');
//     }
// });

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
    Route::view('home', 'auth.home')->name('home');

    // --------------------------------------------Users--------------------------------------------------------

    Route::get('users', [UserController::class, 'users'])->name('users');

    Route::get('users/create', [UserController::class, 'add'])->name('users.add');
    Route::post('users/create/verify', [UserController::class, 'verify'])->name('users.verify');

    Route::get('users/edit', [UserController::class, 'update'])->name('users.update');
    Route::post('users/edit/verify', [UserController::class, 'update_verify'])->name('users.update.verify');

    Route::get('users/delete', [UserController::class, 'delete'])->name('users.delete');

    // -----------------------------------------Permission-----------------------------------------------------

    Route::get('permission', [PermissionController::class, 'permission'])->name('permission');

    Route::get('permission/create', [PermissionController::class, 'add'])->name('permission.add');
    Route::post('permission/create/verify', [PermissionController::class, 'verify'])->name('permission.verify');

    Route::get('permission/edit', [PermissionController::class, 'update'])->name('permission.update');
    Route::post('permission/edit/verify', [PermissionController::class, 'update_verify'])->name('permission.update.verify');

    Route::get('permission/delete', [PermissionController::class, 'delete'])->name('permission.delete');

    // --------------------------------------------Roles--------------------------------------------------------

    Route::get('role', [RoleController::class, 'role'])->name('role');

    Route::get('role/create', [RoleController::class, 'add'])->name('role.add');
    Route::post('role/create/verify', [RoleController::class, 'verify'])->name('role.verify');

    Route::get('role/edit', [RoleController::class, 'update'])->name('role.update');
    Route::post('role/edit/verify', [RoleController::class, 'update_verify'])->name('role.update.verify');

    Route::get('role/delete', [RoleController::class, 'delete'])->name('role.delete');

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
