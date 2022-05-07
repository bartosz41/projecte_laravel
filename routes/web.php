<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\LoginController;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{

    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {

        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {

        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});

// LOGIN

// USERS

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

Route::get('/new-room',[RoomsController::class,'createAndRedirect']);

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
