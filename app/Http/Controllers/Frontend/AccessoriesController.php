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
      $relatedAccessories=Accessories::where('$category_id',$singleAccessories->category_id)
       ->where('id','!=',$singleAccessories->id)
       ->limit(4)->get();
     // dd($singleAccessories);
      return view('frontend.page.single_accessories',compact('singleAccessories','relatedAccessories'));
    }
}
