<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\ReserveController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('games',[GamesController::class,'get']);

Route::get('room-images',[RoomsController::class,'get_images']);

Route::get('last-reserve',[ReserveController::class,'get_last']);

Route::get('user/{userid}',[UsersController::class,'get']);