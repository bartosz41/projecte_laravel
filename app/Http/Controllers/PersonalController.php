<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;

class PersonalController extends Controller
{

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
