<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GamesController;

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



Route::fallback(function(){
    return redirect('/');
});
