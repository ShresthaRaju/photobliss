<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInValidation;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('signOut');
    }

    public function showSignInForm()
    {
        return view('auth.sign_in');
    }

    public function signIn(SignInValidation $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(["authenticated" => true]);
        }
        return response()->json(["authenticated" => false]);

        // return back()->withInput($request->only('email'))->withErrors(['email' => ['Invalid login! Please try again.']]);
    }

    public function signOut()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
