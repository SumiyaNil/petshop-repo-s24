<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Foster;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;

class FosterController
{
    public function foster()
    {
        $allfoster=Foster::paginate(5);
        return view('backend.fostercare',compact('allfoster'));
    }
    public function form()
    {
        return view('backend.fostercareform');
    }
    public function store(Request $request)
    {
       $validation = Validator::make($request->all(),[
        'foster_title'=>'required',
        'foster_description'=>'required',
        'foster_address'=>'required',
        'foster_price'=>'required|numeric',
        'foster_image'=>'required|file|max:1024'
       ]);
       if($validation->fails())
       {
        notify()->error($validation->getMessageBag());
         return redirect()->back();
       }
       $fileName=null;
       if($request->hasFile('foster_image'))
       {
            $file=$request->file('foster_image');
 
            $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
 
            $file->storeAs('/',$fileName);
       }
       Foster::create([
        'name' => $request->foster_title,
        'description' =>$request->foster_description,
        'address' =>$request->foster_address,
        'price' =>$request->foster_price,
        'image' =>$fileName
    ]);
    
    return redirect()->route('foster.list');
    }
}
