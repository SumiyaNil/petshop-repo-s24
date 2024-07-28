<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class HomeController
{
    public function home()
    {
        // dd("test");
        //return view('frontend.master');
         return view('frontend.home');
    }
}
