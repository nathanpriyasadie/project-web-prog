<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt([
            'email' => $email,
            'password' => $password
        ]))
        if($request->remember == true)
        {
            Cookie::queue(Cookie::make('user_email', $email, 30));
            Cookie::queue(Cookie::make('user_password', $email, 30));
        }
        {
            return redirect('/manage-user');
        }
        return back();
    }

    public function loginPage(){
        return view('login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
