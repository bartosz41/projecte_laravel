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
        $rooms=Room::all();
        return view('rooms.roomList')->with('rooms',$rooms);
    }

    public function createAndRedirect(Request $request){

        $room = new Room();

        $room->save();
        return redirect('/room-list');
    }
}
