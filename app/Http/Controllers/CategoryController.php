<?php

namespace App\Http\Controllers;

use App\Events\CreateCategoryEvent;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Throwable;

class CategoryController
{
    public function list()
    {


       if(Cache::get('minu'))
       {
        $title = "Data from cache";
        $allCategory=Category::paginate(20);

       }
       else{
        $title = "Data from database";
        $allCategory=Category::paginate(20);
       Cache::put('minu',$allCategory);   
       }
                        

        // dd($allCategory);
       
       return view('backend.categorylist',compact('allCategory','title'));  
       
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
    
    CreateCategoryEvent::dispatch();

    return redirect()->route('category.list');
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