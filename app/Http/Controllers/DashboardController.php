<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Foster;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController
{
    public function dashboard()
    {
        $customerCount=Customer::count();
        $totalSale=Order::sum('total_amount');
       
        return view('backend.dashboard',compact('customerCount','totalSale'));
    }
}
