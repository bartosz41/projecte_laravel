<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;

class GamesController extends Controller
{
    public function get(Request $request)
    {
        $games=Game::all();
        $games_valorations = [];
        foreach($games as $key => $game){
            $games_valorations[$key]['game'] = $game;
            $games_valorations[$key]['valorations'] = $game->valorations;
            foreach($games_valorations[$key]['valorations'] as $valoration){
                $client_id = $valoration->client_id;
                $client = User::find($client_id);
                $valoration['client_name'] = $client->name;
            }
        }
        return response()->json($games_valorations);
    }

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
