<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

class CustomerController
{
    public function customer()
    {
        $allcustomer = Customer::paginate(5);
        return view('backend.customer',compact('allcustomer'));
    }
    public function form()
    {
        return view('backend.customerform');
    }
    public function store(Request $request)
    {

        
        //validation
        $validation = Validator::make($request->all(),[
         'customer_name'=>'required|max:20',
         'customer_number'=>'required',
         'customer_image'=>'required|file|max:1024'
         
        ]);
        if($validation->fails())
        {
            notify()->error($validation->getMessageBag());
            return redirect()->back();
        }
        
        $fileName=null;

        if($request->hasFile('customer_image'))
        {
            $file=$request->file('customer_image');
            $fileName = date('Ymdhis').'.'.$file-> getClientOriginalExtension();
            $file -> storeAs('/', $fileName);
        }
         



        //create operation
         Customer::create([
            'name'=>$request->customer_name,
            'number'=>$request->customer_number,
            'image'=>$fileName
         ]);
         return redirect()->route('customer.list');
    }
    
}
