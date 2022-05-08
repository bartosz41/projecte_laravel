<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function save_experience(Request $request){
        $req = $request->all();
        $experience = Experience::find($req['experience_id']);
        if(isset($req['commentary'])){$experience->commentary = $req['commentary'];}
        if(isset($req['points'])){$experience->commentary = $req['points'];}
        $experience->save();
        return $experience;
    }
}
