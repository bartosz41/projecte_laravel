<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reserve;
use App\Models\Game;
use App\Models\Room;
use App\Models\Valoration;
use \Datetime;
use App\Models\Personal;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    public function all($clientid){
        $user = User::find($clientid);
        $reserves = $user->reserves;
        return view('reserves.list')->with('reserves',$reserves);
    }

    public function validate_admin_save(Request $request, $reserveid){
        $data = $request->all();
        $reserve = Reserve::find($reserveid);

        if(isset($data['personal_id'])){
            $reserve->staff_id = $data['personal_id'];
        }
        if(isset($data['game_id'])){
            $reserve->game_id = $data['game_id'];
        }
        if(isset($data['room_id'])){
            $reserve->room_id = $data['room_id'];
        }
        if(isset($data['finished'])){
            if($data['finished']){
                $reserve->finished = 1;
            }else{
                $reserve->finished = 0;
            }
            
        }
        $reserve->save();
        return redirect('/reserve-list-all');
    }

    public function validate_admin($reserveid){

        $rooms = Room::all();
        $games = Game::all();
        $staff = Personal::all();
        $reserve = Reserve::find($reserveid);
        return view('reserves.validate_form')->with('reserve',$reserve)->with('rooms',$rooms)->with('games',$games)->with('staff',$staff);
    }

    public function all_admin(){
        $reserves = Reserve::all();
        return view('reserves.list_all')->with('reserves',$reserves);
    }

    public function delete($reserveid){
        $reserve = Reserve::find($reserveid);
        $reserve->delete();
        return redirect('/reserve-list');
    }
    
    public function showOne($reserveid){
        $reserve = Reserve::find($reserveid);
        $games = Game::all();
        return view('reserves.detail')->with('reserve',$reserve)->with('games',$games);
    }

    public function configure(Request $request,$reserveid){
        $validated=$request->validate(['players'=>'max:12|min:0','player_names'=>'max:200']);

        $reserve = Reserve::find($reserveid);
        $req = request()->all();
        
        if(isset($req['date'])){
            if($this->isValid($req['date'],'Y-mm-dd H:i:s')){
                $reserve->date=$req['date'];   
            }
        }

        if(isset($req['players'])){
            $reserve->players=$req['players'];
        }
        
        if(isset($req['player_names'])){
            $reserve->player_names=$req['player_names'];
        }

        if(isset($req['game_id'])){
            $game = Game::find($req['gameid']);
            if(isset($game)){
                if($game){
                    $reserve->game_id = $req['game_id'];
                }
            }
        }
        
        $reserve->save();
        $valoration = $reserve->valorations;
        $valoration->game_id = $reserve->game_id;
        $valoration->save();
        
        return redirect('/');
    }

    public function get_last($id)
    {
        $user=User::find($id);
        $last_reserve = $user->reserves->last();
        return response()->json($last_reserve);
    }

    function isValid($date, $format = 'Y-m-d'){
        $dt = DateTime::createFromFormat($format, $date);
        return $dt && $dt->format($format) === $date;
    }

    public function store(Request $request,$clientid){
        $validated=$request->validate(['name'=>'required','organization'=>'required','email'=>'required','phone'=>'required','country'=>'required']);

        $req = request()->all();
        $reserve = new Reserve();
        $reserve->name=$req['name'];
        $reserve->organization=$req['organization'];
        if($this->validate_email($req['email'])){
            $reserve->email=$req['email'];
        }else{
            return redirect('/');
        }
        $reserve->phone=$req['phone'];
        $reserve->country=$req['country'];

        //$client = User::find($clientid);
        $reserve->user_id = $clientid;

        $reserve->save();

        $valoration = new Valoration();
        $valoration->reserve_id = $reserve->id;
        $valoration->user_id = $clientid;
        $valoration->finished = 0;

        $valoration->save();

        return redirect('/reserve-list/'.$clientid);
    }

    function validate_email($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
}
