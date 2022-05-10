<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Valoration;


class ValorationController extends Controller
{
    public function save_valoration(Request $request){
        $validated=$request->validate(['commentary'=>'required|max:50','points'=>'required|max:5']);
        $req = $request->all();
        $valoration = Valoration::find($req['valoration_id']);
        if(isset($req['commentary'])){$valoration->commentary = $req['commentary'];}
        if(isset($req['points'])){$valoration->points = $req['points'];}
        $valoration->save();
        return redirect('/show-user/'.$valoration->user_id);
    }
}
