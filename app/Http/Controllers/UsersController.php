<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the user profile.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showProfile(User $username)
    {
        $latest_upload = $username->photos()->latest()->first();
        if ($latest_upload) {
            $photo_name = $latest_upload->photo_name;
        } else {
            $photo_name = null;
        }
        return view('user.profile', compact('username', 'photo_name'));
    }
}
