<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpValidation;
use App\User;

class SignUpController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showSignUpForm()
    {
        return view('auth.sign_up');
    }

    public function registerUser(SignUpValidation $request)
    {
        $user            = new User();
        $user->full_name = $request->fullName;
        $user->email     = $request->email;
        $user->username  = $request->username;
        $user->password  = bcrypt($request->password);

        if ($user->save()) {
            return response()->json('Registration Successful');
        }
    }
}
