<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function getUsers(Request $request){
        $data = User::get();
        return view('users')->with(['data'=>$data]);
    }

    public function editUsers(Request $request, $id){
        $data = User::where('id', $id)->first();
        return view('editusers');
    }

    public function deleteUser(Request $request, $id){
        $data = User::where('id', $id)->delete();
        return back()->with("msg", "<div class='alert alert-success'> <span> Deleted Successfully </span> </div>");
    }
}
