<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController
{
    //login ar jonno

public function loginentry()
{
    return view('backend.loginentry');
    
}
public function form(Request $request)
{
    $credentials = $request ->except("_token");
    $check=Auth::attempt($credentials);
    if($check)
    {
        notify()->success("login successful");
        return redirect()->route('master.panel');

    }else{
        //2 number user
        return redirect()->back();
    }
    
}
public function logout()
{
    Auth::logout();
    notify()->success('successfully logout');
    return redirect()->route('login');


}
}
