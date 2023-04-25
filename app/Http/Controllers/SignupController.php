<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function signup(Request $request){
      return  view('signup');
    }

    public function register(Request $request){
        
        $attribute = $request->validate([
            'firstname'=>'required', 
            'lastname'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'confirmpassword'=> 'required',
        ]); 
       
        if($request->password != $request->confirmpassword){
            return back()->with("msg", "<div class='alert alert-danger'> <span> Password Incorrect </span> </div>");
        };
        
        $user = User::where('email', $request->email)->first();

        if(isset($user)){
            return back()->with("msg", "<div class='alert alert-danger'> <span> Email Already Exist </span> </div>");
        };


        $password = Hash::make($request->password);
        $confirmpassword = Hash::make($request->confirmpassword);

        User::create([
            'firstname'=>$request->firstname, 
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'password'=>$password,
            'confirm_password'=>$confirmpassword
        ]);
        return view('login');

    }
}
