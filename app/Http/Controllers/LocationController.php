<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController
{
    public function list()
    {
        $location=Location::paginate(5);
        return view('backend.locationlist',compact('location'));
    }
    public function form()
    { 
        $location = Location::all();
        return view('backend.locationform',compact('location'));

    }
    public function store(Request $request)
    {

      
      //validation
      $validation = Validator::make($request->all(),[
         'location'=>'required',
      ]);
      if($validation->fails())
      {
        notify()->error($validation->getMessageBag());
        return redirect()->back();
      }
      //query
      Location::create([
         'location'=>$request->location,
      ]);
     
      return redirect()->route('location.list');
    }
    public function edit($id)
    {
     $location = Location::find($id);
     return view('backend.page.editLocation',compact('location'));
    }
    public function delete($id)
    {
       $location = Location::find($id);
       $location->delete();
       notify()->success("location deleted successfully");
       return redirect()->back();
    }
    public function update(Request $request,$id)
    {
      $location = Location::find($id);
       $location->update([
        'location'=>$request->location,
       ]);
       return redirect()->back();
    }
}
