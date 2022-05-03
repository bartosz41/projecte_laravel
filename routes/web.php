<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RoomsController;

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
    return view('welcome');
});

// USERS

Route::get('/register', function () {
    return view('users.register');
});

Route::get('/login', function () {
    return view('users.login');
});

Route::post('/create-user',[RegisterController::class,'store']);

Route::get('/edit-user/{userid}',[RegisterController::class,'editOne']);

Route::get('/show-user/{userid}',[RegisterController::class,'showOne']);

Route::get('/user-list',[RegisterController::class,'all']);

Route::get('/delete-user/{userid}',[RegisterController::class,'deleteOne']);

Route::post('/update-user/{userid}',[RegisterController::class,'update']);

// GAMES

Route::get('/new-game',function(){
    return view('games.create-game');
});

Route::post('/create-game',[GamesController::class,'store']);

Route::get('/game-list',[GamesController::class,'all']);

Route::get('/delete-game/{gameid}',[GamesController::class,'deleteOne']);

Route::get('/edit-game/{gameid}',[GamesController::class,'editOne']);

Route::post('/update-game/{userid}',[GamesController::class,'update']);

// PERSONAL

Route::get('/new-personal',function(){
    return view('personal.create-personal');
});

Route::post('/create-personal',[PersonalController::class,'store']);

Route::get('/staff-list',[PersonalController::class,'all']);

Route::get('/delete-staff/{staffid}',[PersonalController::class,'deleteOne']);

Route::get('/edit-staff/{staffid}',[PersonalController::class,'editOne']);

Route::post('/update-staff/{staffid}',[PersonalController::class,'update']);

// ROOM

Route::get('/new-room',function(){
    return view('rooms.create-room');
});

Route::post('/create-room',[RoomsController::class,'store']);

Route::get('/room-list',[RoomsController::class,'all']);

Route::get('/delete-room/{roomid}',[RoomsController::class,'deleteOne']);

Route::get('/edit-room/{roomid}',[RoomsController::class,'editOne']);

Route::post('/update-room/{roomid}',[RoomsController::class,'update']);

// ADMIN

Route::get('/admin',function(){
    return view('admin.admin');
});


Route::fallback(function(){
    return redirect('/');
});
