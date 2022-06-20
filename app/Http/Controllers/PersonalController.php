<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;

class PersonalController extends Controller
{

    public function get_api(Request $request,$staffid){
        $staff = Personal::find($staffid);
        return response()->json($staff);
    }

    public function create_staff(Request $request){
        $validated=$request->validate(['name'=>'required|max:50','surname'=>'required|max:12','dni'=>'required|max:100']);
        $req = request()->all();

        $staff = new Personal();

        if(isset($req['name'])){$staff->name=$req['name'];}
        if(isset($req['surname'])){$staff->surname=$req['surname'];}
        if(isset($req['dni']))$staff->dni=$req['dni'];

        $staff->save();
        return response()->json(["created" => "staff_created"]);
    }

    public function edit_staff(Request $request){
        $validated=$request->validate(['name'=>'max:50','surname'=>'max:12','dni'=>'max:100']);
        $req = request()->all();
        $staffid = $req['staff_id'];
        $staff = Personal::find($staffid);
        if(isset($staff)){

            if(isset($req['name'])){$staff->name=$req['name'];}
            if(isset($req['surname'])){$staff->surname=$req['surname'];}
            if(isset($req['dni']))$staff->dni=$req['dni'];
    
            $staff->save();
            return response()->json(["created" => "staff_saved"]);

        }
        return response()->json("no_staff");
    }

    public function showOne($staffid){
        return view('personal.show')->with(['staff'=>Personal::find($staffid)]);
    }

    public function editOne($staffid){
        return view('personal.edit')->with(['staff'=>Personal::find($staffid)]);
    }

    public function deleteOne($staffid){
        $staff = Personal::find($staffid);
        $staff->delete();
        return redirect('/staff-list');
    }

    public function update(Request $request,$staffid){
        $validated=$request->validate(['name'=>'max:50','surname'=>'max:50','dni'=>'max:9']);
        $data = $request->all();
        $staff = Personal::find($staffid);
        if(isset($data['dni'])){
            if($this->dni($data['dni'])){
                $staff->dni = $data['dni'];
            }
        }
        if(isset($data['name'])){
            $staff->name = $data['name'];
        }
        if(isset($data['surname'])){
            $staff->surname = $data['surname'];
        }
        $staff->save();

        return redirect('/staff-list');
    }

    public function all(){
        $personal=Personal::all();
        return view('personal.personalList')->with('staff',$personal);
    }

    public function store(Request $request){
        $validated=$request->validate(['name'=>'required|max:50','surname'=>'required|max:50','dni'=>'required|max:9']);

        $req = request()->all();
        $staff = new Personal();
        if(isset($req['name'])){
            $staff->name=$req['name'];
        }
        if(isset($req['surname'])){
            $staff->surname=$req['surname'];
        }
        if(isset($req['dni'])){
            if($this->dni($req['dni'])){
                $staff->dni=$req['dni'];
            }
        }
        
        $staff->save();
        return redirect('/staff-list');
    }

    function dni($dni){
        $letter = substr($dni, -1);
        $numbers = substr($dni, 0, -1);
        $valid;
        if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers%23, 1) == $letter && strlen($letter) == 1 && strlen ($numbers) == 8 ){
          $valid=true;
        }else{
          $valid=false;
        }
        return $valid;
    }

}
