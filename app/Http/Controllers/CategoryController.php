<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController
{
    public function list()
    {
        $allCategory=Category::paginate(5);
       
        return view('backend.categorylist',compact('allCategory'));   
        
    }
    public function form()
    {
        return view('backend.categoryform');
    }
    public function store(Request $request)
    {
        $validation=Validator::make($request->all(),
        [
            'cat_name'=>'required|min:2',
        ]);
        
      if($validation->fails())
      {
        notify()->error($validation->getMessageBag());
        return redirect()->back();
      }

        
      Category::create([
        //bam pase table er column name => dan pase input field er name
        'name'=>$request->cat_name,
        'description'=>$request->cat_description
    ]);

    return redirect()->back();
    }
    
}
