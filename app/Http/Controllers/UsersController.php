<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Hash;


class userscontroller extends Controller
{
    function login(Request $req)
    {

         $user= User::where(['email'=>$req->email])->first();
         if(!$user ||  Hash::check($req->password,$user->password))
         {
             return "username or password is not correct";
         }
         else
         {
             $req->session()->put('user',$user);
             return redirect('product');
         }
        
    }
    function register(Request $req)
    {
        $user= new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->passward=Hash::make($req->passward);
        $user->save();
        return redirect("/login");

    }
}
