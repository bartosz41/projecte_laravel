<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $validated = $this->validate_register($request);

        if($this->dni($request['dni'])){
            $users = User::all();
            // VALID DNI UNIQUE
            foreach($users as $user){
                if($user->dni === $request['dni']){
                    return redirect('/register');
                }
            }
            $user = User::create($request->validated());
            $user->name = $request['name'];            
            $user->organization = $request['organization'];
            $user->phone = $request['phone'];
            $user->country = $request['country'];
            $user->dni = $request['dni'];
            $user->role = "User";
            $user->save();
            auth()->login($user);

            return redirect('/')->with('success', "Account successfully registered.");
            }else{
                return redirect('/register');
            }
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

    function validate_register(RegisterRequest $request){
        return $request->validate([
            'name' => 'required|max:50',
            'dni' => 'required|unique:users,dni',
            'organization' => 'required|max:100',
            'phone' => 'required|max:9',
            'country' => 'required|max:50'
        ]);
    }
}
