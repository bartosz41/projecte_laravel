<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function all(){
        $personal=Personal::all();
        return view('personal.personalList')->with('personal',$personal);
    }
}
