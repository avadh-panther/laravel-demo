<?php

use App\Http\Controllers\Email\EmailController;
use App\Http\Controllers\Template\TemplateController;
use App\Http\Controllers\Store\StoreController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Mime\Test\Constraint\EmailTextBodyContains;

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

Route::get('/', function () {
    return view('layout');
});

Route::prefix('template')->group(function () {

    Route::get('/', [TemplateController::class, 'template'])->name('template');
    Route::get('add', [TemplateController::class, 'add'])->name('template.add');
    Route::post('add/verify', [TemplateController::class, 'add_verify'])->name('template.add.verify');
    Route::get('edit', [TemplateController::class, 'edit'])->name('template.edit');
    Route::post('edit/verify', [TemplateController::class, 'edit_verify'])->name('template.edit.verify');
    Route::get('delete', [TemplateController::class, 'delete'])->name('template.delete');
});

Route::prefix('store')->group(function () {

    Route::get('/', [StoreController::class, 'store'])->name('store');
    Route::get('add', [StoreController::class, 'add'])->name('store.add');
    Route::post('add/verify', [StoreController::class, 'add_verify'])->name('store.add.verify');
    Route::get('edit', [StoreController::class, 'edit'])->name('store.edit');
    Route::post('edit/verify', [StoreController::class, 'edit_verify'])->name('store.edit.verify');
    Route::get('delete', [StoreController::class, 'delete'])->name('store.delete');
    Route::post('search', [StoreController::class, 'search'])->name('store.search');
});

Route::prefix('email')->group(function () {

    Route::get('/', [EmailController::class, 'create'])->name('create');
    Route::get('template_description', [EmailController::class, 'template_description'])->name('template_description');
    Route::post('send', [EmailController::class, 'send_mail'])->name('email.send');
});
