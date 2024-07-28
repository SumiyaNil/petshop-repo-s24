<?php

namespace App\Http\Controllers;

use App\Models\Accessories;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;

class AccessoriesController
{
  public function accessories()
  {
    $allaccessories=Accessories::with('category')->paginate(5);
       
       
     return view('backend.accessories',compact('allaccessories')); 
    
  }
  public function form()
  {
    $allCategory=Category::all();

        return view('backend.accessoriesform',compact('allCategory'));

    
  }
  public function store(Request $request)
  {

    $validation = Validator::make($request->all(),[ 
      'acc_title'=>'required|max:50',
        'acc_description'=>'required|max:150',
        'acc_price'=>'required|max:10',
        'acc_stock'=>'required|max:10',
        'acc_image'=>'required|file|max:1024',  
        'category_id'=>'required' 
       
      ]);

      if($validation->fails())
      {
        notify()->error($validation->getMessageBag());
        return redirect()->back();
      }
      $fileName=null;
      if($request->hasFile('acc_image'))
      {
           $file=$request->file('acc_image');

           $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();

           $file->storeAs('/',$fileName);
      }

    //dd($request->all());
    Accessories::create([
        'name' => $request->acc_title,
        'description' =>$request->acc_description,
        'stock' =>$request->acc_stock,
        'price' =>$request->acc_price,
        'image' =>$fileName,
        'category_id'=>$request->category_id
    ]);
    
    return redirect()->route('accessories.list');
  }

}
