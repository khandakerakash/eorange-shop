<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\User;
use App\SocialProvider;
use Socialite;
use Config;
use App\Notification;

class UserRegisterController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:user', ['except' => ['logout']]);
    }

    public function register(Request $request)
    {
      // Validate the form data

      $this->validate($request, [
        'email'   => 'required|email|unique:users',
        'password' => 'required|confirmed'
      ]);

        $user = new User;
        $input = $request->all();        
        $input['password'] = bcrypt($request['password']);
        $user->fill($input)->save();
        $notification = new Notification;
        $notification->user_id = $user->id;
        $notification->save();
        Auth::guard('user')->login($user); 
        return redirect()->route('user-dashboard');
    }


  
}