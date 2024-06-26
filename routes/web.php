<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthSPA\LoginController;
use \App\Http\Controllers\AuthSPA\LogoutController;
use \App\Http\Controllers\AuthSPA\RegisterController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::prefix('auth')->group(function () {
    Route::post('/login', LoginController::class)->middleware('guest');
    Route::post('/logout', LogoutController::class);
    Route::post('/register', RegisterController::class);
});
