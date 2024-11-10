<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Accessories;
use App\Models\Category;
use App\Models\Foster;
use App\Models\Location;
use Illuminate\Http\Request;

class HomeController
{
    public function home()
    {
        // dd("test");
        //return view('frontend.master');
       
        $foster=Foster::where('customer_id',auth('customerGuard')->user())->paginate(20);
        
        // $fostercount = count($foster);
        $location=Location::all();
        $allaccessories=Accessories::all();
        
        $fostercount = count($foster);
       // $categories=Category::where('name','LIKE','%'.request()->search_category.'%')->get();
         return view('frontend.home',compact('location','fostercount','allaccessories'));

         
      
    }
    //show frontend short by category
    public function showCategory($id)
    {
        
       // $category=Accessories::find($id);
        $allcategory=Accessories::where('category_id',$id)->get();
        
        return view('frontend.page.showSingleCategory',compact('allcategory'));
    }
    public function changeLang($lang)
    {
     session()->put('locale',$lang);
     return redirect()->back();
    }
}
