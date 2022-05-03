<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomsController extends Controller
{
    public function showOne($roomid){
        return view('rooms.show')->with(['room'=>Room::find($roomid)]);
    }

    public function editOne($roomid){
        return view('rooms.edit')->with(['room'=>Room::find($roomid)]);
    }

    public function deleteOne($roomid){
        $room = Room::find($roomid);
        $room->delete();
        return redirect('/room-list');
    }

    public function update(Request $request,$roomid){
        $data = $request->all();
        $room = Room::find($roomid);
        if(isset($data['dni'])){
            $room->dni = $data['dni'];
        }
        if(isset($data['name'])){
            $room->name = $data['name'];
        }
        if(isset($data['surname'])){
            $room->surname = $data['surname'];
        }
        $room->save();

        return redirect('/room-list');
    }

    public function all(){
        $room=Room::all();
        return view('room.roomList')->with('room',$room);
    }

    public function store(Request $request){
        $validated=$request->validate(['name'=>'required','surname'=>'required','dni'=>'required']);

        $req = request()->all();
        $room = new Room();
        $room->name=$req['name'];
        $room->surname=$req['surname'];
        $room->dni=$req['dni'];

        $room->save();
        return redirect('/room-list');
    }
}
