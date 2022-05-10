<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{

    public function all(){
        $users = User::all();
        return view('users.list')->with('users',$users);
    }

    public function show_user($userid){
        $user = User::with('valorations')->get()->find($userid);
        return view('users.profile')->with('user',$user);
    }

    public function edit_user($userid){
        return view('users.edit-profile')->with(['user'=>User::find($userid)]);
    }

    public function edit_user_admin($userid){
        return view('users.edit')->with(['user'=>User::find($userid)]);
    }

    public function update_user_admin(Request $req,$userid){
        //$validated = $this->validateUser($req);
        $data = $req->all();
        $user = User::find($userid);
        if(isset($req['name'])){$user->name = $req['name'];}
        if(isset($req['email'])){$user->email = $req['email'];}
        if(isset($req['dni'])){$user->dni = $req['dni'];}
        if(isset($req['organization'])){$user->organization = $req['organization'];}
        if(isset($req['phone'])){$user->phone = $req['phone'];}
        if(isset($req['country'])){$user->country = $req['country'];}
        $user->save();
        return redirect('/users-list');

    }

    public function save_edit_user(Request $req,$userid){
        $validated=$req->validate(['name'=>'max:50','organization'=>'max:50','phone'=>'max:9','country'=>'max:50']);
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
