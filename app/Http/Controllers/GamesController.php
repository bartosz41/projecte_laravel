<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;

class GamesController extends Controller
{

    public function get_api(Request $request,$gameid){
        $game = Game::find($gameid);
        return response()->json($game);
    }

    public function create_game(Request $request){
        $validated=$request->validate(['name'=>'required|max:50','players'=>'required|max:12','price'=>'required|max:100']);
        $req = request()->all();
        if($this->isValidUrl($req['image'])){
            $game = new Game();

            if(isset($req['name'])){$game->name=$req['name'];}
            if(isset($req['image'])){$game->image=$req['image'];}
            if(isset($req['players']))$game->players=$req['players'];
            if(isset($req['price']))$game->price=$req['price'];

            $game->save();
            return response()->json(["created" => "game_created"]);
        }else{
            return response()->json(["created" => "game_not_created"]);
        }
    }

    public function edit_game(Request $request){
        $validated=$request->validate(['name'=>'max:50','players'=>'max:12','price'=>'max:100']);
        $req = request()->all();
        $gameid = $req['game_id'];
        $game = Game::find($gameid);
        if(isset($game)){
            if($this->isValidUrl($req['image'])){

                if(isset($req['name'])){$game->name=$req['name'];}
                if(isset($req['image'])){$game->image=$req['image'];}
                if(isset($req['players']))$game->players=$req['players'];
                if(isset($req['price']))$game->price=$req['price'];
    
                $game->save();
                return response()->json(["created" => "game_saved"]);
            }else{
                return response()->json(["created" => "game_not_saved"]);
            }
        }
        return response()->json("no_game");
    }

    public function get(Request $request)
    {
        $games=Game::all();
        $games_valorations = [];
        foreach($games as $key => $game){
            $games_valorations[$key]['game'] = $game;
            $games_valorations[$key]['valorations'] = $game->valorations;
            foreach($games_valorations[$key]['valorations'] as $valoration){
                $user_id = $valoration->user_id;
                $client = User::find($user_id);
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
            if($this->isValidUrl($request['image'])){
                $game->image = $data['image'];
            }else{
                return redirect('/new-game');
            }
        }
        if(isset($data['price'])){
            $game->price = $data['price'];
        }
        $game->save();

        return redirect('/game-list');
    }

    function isValidUrl($url){
        if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
            return false;
        }
        return true;
    }
}
