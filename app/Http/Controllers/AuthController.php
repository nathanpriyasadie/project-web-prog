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
        ])){
            if($request->remember == true)
            {
                Cookie::queue(Cookie::make('user_email', $email, 30));
                Cookie::queue(Cookie::make('user_password', $email, 30));
            }
            return redirect('/home');
        }
        return redirect('/login');
    }

    public function loginPage(){
        return view('login');
    }

    public function register(Request $request){
        $validator = Validator::make(request()->all(), [
            'name'  => 'min:5',
            'email' => 'email|unique:users,email',
            'password' => 'min:5|alpha_num|confirmed',
            'phone' => 'numeric|min:11',
            'gender'  => 'in:male,female',
            'address' => 'min:10',
            'photo_profile' => 'mimes:jpeg,png,jpg',
            //'agree' => 'accepted'
        ],[
            'name.min' => 'Fullname min 5 characters',
            'email.email' => 'invalid email format',
            'email.unique' => 'email must be unique',
            'password.min' => 'Password min 5 characters',
            'password.alpha_num' => 'password must alphanumeric',
            'password.confirmed' => 'password must match',
            'phone.numeric' => 'phone must be numeric',
            'phone.min' => 'phone min 11 numbers',
            'gender.in' => 'invalid gender format',
            'address.min' => 'address min 10 characters',
            'photo_profile.mimes' => 'invalid photo format',
            //'agree.accepted' => 'must agree'
        ]);
        $validator->validate();

        $file = $request->file('photo_profile');
        $filename = 'user-'.$request->name.'.'.$file->getClientOriginalExtension();
        $path=$file->storeAs('public',$filename);

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->phone = $request['phone'];
        $user->address = $request['address'];
        $user->gender = $request['gender'];
        $user->photo_profile = $filename;

        $user->save();
        return redirect('/login');
    }

    public function registerpage(){
        return view('register');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
