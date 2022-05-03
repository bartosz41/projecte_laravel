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
        $data = $request->all();
        $staff = Personal::find($staffid);
        if(isset($data['dni'])){
            $staff->dni = $data['dni'];
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
        $validated=$request->validate(['name'=>'required','surname'=>'required','dni'=>'required']);

        $req = request()->all();
        $staff = new Personal();
        $staff->name=$req['name'];
        $staff->surname=$req['surname'];
        $staff->dni=$req['dni'];

        $staff->save();
        return redirect('/staff-list');
    }
}
