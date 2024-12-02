<?php

namespace App\Http\Controllers;

use App\Events\CreateBreedEvent;
use App\Models\Breed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BreedController
{
    public function list()
    {
      if(Cache::get('manal'))
      {
        $title="data is coming from cache";
        $allbreed=Breed::paginate(20);

      }
      else{
        $title = "data is coming from database";
        $allbreed = Breed::paginate(20);
        Cache::put('manal',$allbreed);
      }
  
     return view('backend.breedlist',compact('allbreed','title'));
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
      CreateBreedEvent::dispatch();
      return redirect()->back();
    }
    public function viewBreed($id)
    {
      $breed=Breed::find($id);
      return view('backend.page.viewBreed',compact('breed'));
    }
    public function deleteBreed($id)
    {
      $breed=Breed::find($id)->delete();
      notify()->success("breed deleted successfully");
      return redirect()->back();

    }
    public function editBreed($id)
    {
      $breed=Breed::find($id);
      return view('backend.page.editbreed',compact('breed'));
      
    }
    public function updateBreed(Request $request,$id)
    {
      $breed=Breed::find($id);
      $breed->update([
        'name'=>$request->breed_name,
        'cost'=>$request->cost,
      ]);
      notify()->success("breed details updated");
      return redirect()->back();
    }
}
