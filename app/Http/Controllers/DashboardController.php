<?php

namespace App\Http\Controllers;

use App\Models\Accessories;
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
        $allfoster=Foster::count();
        $allaccessories=Accessories::count();
        return view('backend.dashboard',compact('customerCount','allfoster','totalSale','allaccessories'));
    }
}
