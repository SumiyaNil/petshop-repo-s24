<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController
{
    public function list()
    {
        $allpayment=Payment::paginate(5);
       
       
 
        return view('backend.paymentlist',compact('allpayment'));

    
    }
    public function form(){
        return view('backend.paymentform');
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[ 
            
              'payment_description'=>'required|max:150',
              'payment_price'=>'required|max:10',
              'payment_method'=>'required|max:10'  
             
            ]);
      
            if($validation->fails())
            {
              notify()->error($validation->getMessageBag());
              return redirect()->back();
            }
           /* $fileName=null;
            if($request->hasFile('acc_image'))
            {
                 $file=$request->file('acc_image');
      
                 $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
      
                 $file->storeAs('/',$fileName);
            }*/
      
          //dd($request->all());
          Payment::create([
        
              'description' =>$request->payment_description,
              
              'price' =>$request->payment_price,
              'method' =>$request->payment_method
          ]);
          
          return redirect()->route('payment.list');
        }
}