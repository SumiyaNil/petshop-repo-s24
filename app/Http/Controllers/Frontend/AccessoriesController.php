<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Accessories;
use Illuminate\Http\Request;

class AccessoriesController
{
    public function accessories()
    {
        $allaccessories = Accessories::all();
        return view('frontend.accessories',compact('allaccessories'));
    }
    public function show($id)
    {
        
      $singleAccessories=Accessories::find($id);
      $relatedAccessories=Accessories::where('category_id',$singleAccessories->category_id)
       ->where('id','!=',$singleAccessories->id)
       ->limit(3)
       ->get();
       
     // dd($singleAccessories);
      return view('frontend.page.single_accessories',compact('singleAccessories','relatedAccessories'));
    }
    public function search()
    {
      $allaccessories=Accessories::where('name','LIKE','%'.request()->search_key.'%')->get();
      return view('frontend.page.search', compact('allaccessories'));
    }
    public function load()
    {
      $allaccessories = Accessories::paginate(10);

  

      if (request()->ajax()) {

          $view = view('frontend.accessories', compact('allaccessories'))->render();



          return response()->json(['html' => $view]);

      }



      return view('frontend.page.load', compact('allaccessories')); 
    }

}
