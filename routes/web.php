<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/homepage',[HomeController::class, 'dash'], function () {
    return view('homepage');
})->name('homepage');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', \App\Http\Controllers\UsersController::class);
    Route::resource('blogs', \App\Http\Controllers\BlogController::class);
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/homepage', function () {
//         return view('homepage');
//     })->name('homepage');
// });

// Route::group(['middleware' => 'auth'], function () {

//     Route::resource('users', \App\Http\Controllers\UsersController::class);
// });

