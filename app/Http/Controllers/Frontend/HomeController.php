<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Location;
use Illuminate\Http\Request;

class HomeController
{
    public function home()
    {
        // dd("test");
        //return view('frontend.master');
        
        $location=Location::all();
         return view('frontend.home',compact('location'));
    }
}
