<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function get(Request $request)
    {
        $user=User::all();
        return response()->json($user);
    }

    public function show_user($userid){
        return view('users.profile')->with(['user'=>User::find($userid)]);
    }

    public function edit_user($userid){
        return view('users.edit-profile')->with(['user'=>User::find($userid)]);
    }

    public function save_edit_user(Request $req,$userid){
        //$validated = $this->validateUser($req);
        $data = $req->all();
        $user = User::find($userid);
        if(isset($req['name'])){$user->name = $req['name'];}
        if(isset($req['organization'])){$user->organization = $req['organization'];}
        if(isset($req['phone'])){$user->phone = $req['phone'];}
        if(isset($req['country'])){$user->country = $req['country'];}
        $user->save();
        return redirect('/show-user/'.$userid);

    }

    public function delete_user($userid){
        $user = User::find($userid);
        $user->delete();
        return view('auth.login');
    }
}
