<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class CategoryController
{
    public function list()
    {
        $allCategory=Category::paginate(20);
       
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
            'cat_name'=>'required',
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
    public function view($id)
    {
     $allCategory = Category::find($id);
     return view('backend.page.categoryview',compact('allCategory'));
    }
    public function delete($id)
    {
        try{
            $allCategory=Category::find($id);
            $allCategory->delete();
    
            notify()->success('Category deleted.');
            return redirect()->back();
        }catch(Throwable $ex)
        {
            notify()->error('Category has product.');
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $allCategory = Category::find($id);
        return view('backend.page.editCategory',compact('allCategory'));
    }
    public function update(Request $request, $id)
    {
        $allCategory= Category::find($id);
        $allCategory->update([
            'name'=>$request->cat_name,
            'description'=>$request->cat_description,
        ]);
        notify()->success('Category updated successfully');
        return redirect()->route('category.list');
        }
}