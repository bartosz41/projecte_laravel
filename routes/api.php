<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalController;
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

Route::post('create-staff',[PersonalController::class,'create_staff']);

Route::post('edit-staff',[PersonalController::class,'edit_staff']);

Route::get('staff/{staffid}',[PersonalController::class,'get_api']);

Route::post('create-game',[GamesController::class,'create_game']);

Route::post('edit-game',[GamesController::class,'edit_game']);

Route::get('room-images',[RoomsController::class,'get_images']);

Route::get('rooms',[RoomsController::class,'get']);

Route::get('game/{gameid}',[GamesController::class,'get_api']);

Route::get('last-reserve/{userid}',[ReserveController::class,'get_last']);

Route::get('user/{userid}',[UsersController::class,'get']);
