<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Foster;
use App\Models\Order;
use Illuminate\Http\Request;

class ProfileController
{
    public function profilePage()
    {
       // $orders=Order::where('customer_id',auth('customerGuard')->user()->id)->get();
        
        return view('frontend.page.profile');
    }
    public function profileOrder()
    {
        $orders=Order::where('customer_id',auth('customerGuard')->user()->id)->get();
        return view('frontend.page.orderProfile',compact('orders'));
        
    }
    public function profileFoster()
    {
        $fosters=Foster::where('customer_id',auth('customerGuard')->user()->id)->get();
        return view('frontend.page.fosterProfile',compact('fosters'));
    }
}
