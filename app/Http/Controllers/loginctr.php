<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginctr extends Controller
{
    function data(Request $req)
    {
        // return "Form Submitted";
        // return $req->input();
        // return $req->all();
        $req->validate([
            "username"=>"required",
            "passward"=>"required"
        ]);
        $name = $req->input('username');
        $pass = $req->input('passward');
        return "name is : $name";

    }
}
