<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        //dd(request()->all());
        $formData = request()->validate([
            'name' => 'required|max:255|min:3',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|unique:users,email' ,
            'password' => 'required|min:8'
        ]);
        // dd($formData);
        $user = User::create($formData);

        //login
        auth()->login($user);

        return redirect('/')->with('success','Welcome '.$user->name);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('successs','See you later');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function check(){
        //dd("hit");
        //validation
        $user = request()->validate([
            "email" => "required|max:255|exists:users,email",
            "password" => 'required|min:8|max:255'
        ],[
            'email.required' => "We need your email address",
            'password.min' => "Password should be more than 8 characters"
        ]);
        //dd($user);
        //auth attempt
            //if user credentials correct -> redirect home
            //if user credentials fail -> redirect login form
        if(auth()->attempt($user)){
           if(auth()->user()->is_admin){
                return redirect('/admin/blogs');
           }else{
                return redirect('/')->with('success','Welcome Back');
           }
        }else{
            return redirect()->back()->withErrors([
                'email' => 'Enter your email and password again'
            ]);
        } //email exists or not in database / if exists check password

    }

}
