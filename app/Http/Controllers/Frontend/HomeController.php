<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Foster;
use App\Models\Location;
use Illuminate\Http\Request;

class HomeController
{
    public function home()
    {
        // dd("test");
        //return view('frontend.master');
         
        $foster=Foster::where('customer_id',auth('customerGuard')->user())->paginate(5);
        
        $fostercount = count($foster);
        $location=Location::all();
         return view('frontend.home',compact('location','fostercount'));
    }
}
