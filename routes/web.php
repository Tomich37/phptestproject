<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\MainController;
Route::get('/home', [MainController::class, 'home']);

Route::get('/authorization', [MainController::class, 'authorization']);
//
//Route::get('/about',[MainController::class, 'about']);
//
Route::post('/authorization/check',[MainController::class, 'authorization_check']);

