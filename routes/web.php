<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ValorationController;

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
    return view('home.index');
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

// EXPERIENCES

Route::post('/save-valoration',[ValorationController::class,'save_valoration']);

// USERS

Route::get('/show-user/{userid}',[UsersController::class,'show_user']);

Route::get('/edit-user/{userid}',[UsersController::class,'edit_user']);

Route::get('/users-list',[UsersController::class,'all']);

Route::get('/edit-user-admin/{userid}',[UsersController::class,'edit_user_admin']);

Route::post('/update-user-admin/{userid}',[UsersController::class,'update_user_admin']);

Route::post('/save-edit-user/{userid}',[UsersController::class,'save_edit_user']);

Route::get('/delete-user/{userid}',[UsersController::class,'delete_user']);

// RESERVES

Route::get('/reserve-list-all',[ReserveController::class,'all_admin']);

Route::get('/reserve',function(){
    return view('reserves.create-reserve');
});

Route::post('/validate-reserve-save/{reserveid}',[ReserveController::class,'validate_admin_save']);

Route::get('/validate-reserve/{reserveid}',[ReserveController::class,'validate_admin']);

Route::post('/create-reserve/{clientid}',[ReserveController::class,'store']);

Route::get('/reserve-list/{clientid}',[ReserveController::class,'all']);

Route::post('/save-reserve/{reserveid}',[ReserveController::class,'configure']);

Route::get('/detail-reserve/{reserveid}',[ReserveController::class,'showOne']);

Route::get('/delete-reserve/{reserveid}',[ReserveController::class,'delete']);

// GAMES

Route::get('/new-game',function(){
    return view('games.create-game');
});

Route::post('/create-game',[GamesController::class,'store']);

Route::get('/game-list',[GamesController::class,'all']);

Route::get('/delete-game/{gameid}',[GamesController::class,'deleteOne']);

Route::get('/edit-game/{gameid}',[GamesController::class,'editOne']);

Route::post('/update-game/{gameid}',[GamesController::class,'update']);

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
