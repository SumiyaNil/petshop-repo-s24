<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use Illuminate\Http\Request;

class BreedController
{
    public function list()
    {
     $allbreed=Breed::paginate(5);
     return view('backend.breedlist',compact('allbreed'));
    }
    public function form()
    {
    
     return view('backend.breadform');
    }
    public function store(Request $request)
    {
      
      Breed::create([
        'name'=>$request->breed_name,
        'cost'=>$request->cost,
      ]);
      return redirect()->back();
    }
}
