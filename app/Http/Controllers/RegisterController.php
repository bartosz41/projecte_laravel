<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function all(){
        $users=User::all();
        return view('users.usersList')->with('users',$users);
    }

    public function showOne($userid){
        return view('users.showUser')->with(['user'=>User::find($userid)]);
    }

    public function editOne($userid){
        return view('users.edit')->with(['user'=>User::find($userid)]);
    }

    public function deleteOne($userid){
        $user = User::find($userid);
        $user->delete();
        return redirect('/user-list');
    }

    public function update(Request $request,$userid){
        $data = $request->all();
        $user = User::find($userid);
        if(isset($data['name'])){
            $user->name = $data['name'];
        }
        if(isset($data['email'])){
            $user->email = $data['email'];
        }
        if(isset($data['password'])){
            $user->password = $data['password'];
        }
        $user->save();

        return redirect('/user-list');
    }

    public function store(Request $request){
        $validated=$request->validate(['name'=>'required','email'=>'required','psw'=>'required']);

        $req = request()->all();
        $user = new User();
        $user->name=$req['name'];
        $user->email=$req['email'];
        if(isset($req['psw'])){
            if($req['psw'] == $req['psw-repeat']){
                $user->password=$req['psw'];
            }
        }
        $user->save();
        return redirect('/user-list');
    }
}
