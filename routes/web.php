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

Route::get('/about',[MainController::class, 'about']);

Route::get('/review',[MainController::class, 'review']);
Route::post('/review/check',[MainController::class, 'review_check']);

//Route::get('/home', function () {
//    // Только аутентифицированные пользователи могут получить доступ к этому маршруту ...
//})->middleware('auth.basic');

//Route::get('/user/{id}/{name}', function ($id, $name) {
//    return 'ID: '. $id.'. Name: '.$name;
//});

