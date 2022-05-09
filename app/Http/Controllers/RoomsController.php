<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomsController extends Controller
{

    public function get_images(Request $request)
    {
        $room_images = [];
        $rooms = Room::all();
        foreach($rooms as $room){
            $room_images[] = $room->image;
        }
        return response()->json($room_images);
    }

    public function get(Request $request)
    {
        $room_images = [];
        $rooms = Room::all();
        return response()->json($rooms);
    }

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
        $validated=$request->validate(['image'=>'required|max:300']);
        $data = $request->all();
        $room = Room::find($roomid);
        if(isset($data['image'])){
            if($this->isValidUrl($data['image'])){
                $room->image = $data['image'];
            }
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

    function isValidUrl($url){
        if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
            return false;
        }
        return true;
    }
}
