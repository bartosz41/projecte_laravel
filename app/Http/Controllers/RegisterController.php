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
        $user = User::create($request->validated());
        $user->name = $request['name'];
        $user->dni = $request['dni'];
        $user->organization = $request['organization'];
        $user->phone = $request['phone'];
        $user->country = $request['country'];
        $user->role = "User";
        $user->save();
        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}
