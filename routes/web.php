<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
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
Route::get('/w', function () {
    return view('welcome',[
        'imagen'=>'Menu/PampaHamburguesas/erewe.jpg',
    ]);
});

Route::get('/', function () {
    return view('index');
})->name('home');

Route::resource('products', ProductController::class);
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
Route::get('category/getSubcategories/{categoryID}', [CategoryController::class,'getSubcategories'])->name('category.subacategories');
