<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[HomeController::class, 'index'])->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/homepage',[HomeController::class, 'home'], function () {
    return view('homepage');
})->name('homepage');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('blogs', \App\Http\Controllers\BlogController::class);
    // Roles
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('roles', RolesController::class);
    });
    
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('permissions', PermissionsController::class);
    });
});
