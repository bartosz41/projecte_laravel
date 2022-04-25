<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GamesController extends Controller
{
    public function all(){
        $games=Game::all();
        return view('games.gamesList')->with('games',$games);
    }

    public function deleteOne($gameid){
        $gameid = Game::find($gameid);
        $gameid->delete();
        return redirect('/game-list');
    }

    public function editOne($gameid){
        return view('games.edit')->with(['game'=>Game::find($gameid)]);
    }

    public function update(Request $request,$gameid){
        $data = $request->all();
        $game = Game::find($gameid);
        if(isset($data['name'])){
            $game->name = $data['name'];
        }
        if(isset($data['players'])){
            $game->players = $data['players'];
        }
        if(isset($data['image'])){
            $game->image = $data['image'];
        }
        if(isset($data['price'])){
            $game->price = $data['price'];
        }
        $game->save();

        return redirect('/game-list');
    }

    public function store(Request $request){
        $validated=$request->validate(['name'=>'required','players'=>'required','price'=>'required']);

        $req = request()->all();
        $game = new Game();
        $game->name=$req['name'];
        $game->image=$req['image'];
        $game->players=$req['players'];

        $game->price=$req['price'];
        $game->save();
        return redirect('/game-list');
    }
}
