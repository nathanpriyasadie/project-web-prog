<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.manage',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        return redirect('/create-user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.update',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'name'  => 'min:5',
            'email' => 'email|unique:users,email',
            'phone' => 'numeric|min:11',
            'gender'  => 'in:male,female',
            'address' => 'min:10',
            'photo_profile' => 'mimes:jpeg,png,jpg'
        ],[
            'name.min' => 'Fullname min 5 characters',
            'email.email' => 'invalid email format',
            'email.unique' => 'email must be unique',
            'phone.numeric' => 'phone must be numeric',
            'phone.min' => 'phone min 11 numbers',
            'gender.in' => 'invalid gender format',
            'address.min' => 'address min 10 characters',
            'photo_profile.mimes' => 'invalid photo format'
        ]);
        $validator->validate();

        $file = $request->file('photo_profile');
        $filename = 'food-'.$request->name.'.'.$file->getClientOriginalExtension();
        $path=$file->storeAs('public',$filename);

        $user = User::find($id);
        $oldpath = 'public/'.$user['photo_profile'];
        Storage::delete($oldpath);

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->address = $request['address'];
        $user->gender = $request['gender'];
        $user->photo_profile = $filename;

        $user->save();
        return redirect('/manage-user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/manage-user');
    }
}
