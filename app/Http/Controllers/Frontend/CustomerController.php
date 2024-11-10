<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\CustomerController as ControllersCustomerController;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController
{
    public function register(Request $request)
    {
      //validation
    //  dd($request->all());
      
      $validation = Validator::make($request->all(),[
        'customer_name'=>'required',
        'email'=>'required|email',
        'password'=>'required|confirmed|min:4',
        'mobile_number'=>'required|numeric',
        
        

      ]);
      if($validation->fails())
      {
        notify()->error($validation->getMessageBag());
        return redirect()->back();
      }
     
      //Query
      Customer::create([
        'name'=>$request->customer_name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
        'number'=>$request->mobile_number,
        'location'=>$request->location,
       
      ]);
      notify()->success('Customer Registration Successful.');

      return redirect()->back();
    }

    public function login(Request $request)
    {
      $validation = Validator::make($request->all(),[

        'email'=>'required|email',
        'password'=>'required|min:4',
      ]);
      if($validation->fails())
      {
        notify()->error($validation->getMessageBag());
        return redirect()->back();
      }

      $credentials=$request->except('_token');
       
      $check=auth('customerGuard')->attempt($credentials);
      if($check)
      {
        notify()->success('login successful');
        return redirect()->route('frontend.home');
      }
      else{
        notify()->error('login failed');
        return redirect()->route('frontend.home');
      }
    }

    public function logout()
    {
      auth('customerGuard')->logout();
      session()->forget('basket');
      notify()->success('logout successfully');
      return redirect()->route('frontend.home');
    }

   
}
