<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Accessories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccessoriesController extends Controller
{
    public function getAccessories()
    {
        $accessories=Accessories::all();
        return $this->responseSuccess($accessories,'All acessories are here');
    }

    public function createAccessories(Request $request)
    {
        
       // dd(response()->json($request));
        $validation = Validator::make($request->all(),[ 
            'acc_title'=>'required|max:50',
              'acc_description'=>'required|max:150',
              'acc_price'=>'required|max:10',
              'acc_stock'=>'required|max:10',
              'acc_image'=>'required|file|max:1024',  
              'category_id'=>'required',
              'discount'=>'nullable|numeric',
             
            ]);
      
            if($validation->fails())
            {
             return $this->responseFailed($validation->getMessageBag());
            }
            $fileName=null;
            if($request->hasFile('acc_image'))
            {
                 $file=$request->file('acc_image');
      
                 $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
      
                 $file->storeAs('/',$fileName);
            }
      
          //dd($request->all());
         $accessories= Accessories::create([
              'name' => $request->acc_title,
              'description' =>$request->acc_description,
              'stock' =>$request->acc_stock,
              'price' =>$request->acc_price,
              'image' =>$fileName,
              'category_id'=>$request->category_id,
              'discount'=>$request->discount,
          ]);
          
         return $this->responseSuccess($accessories,'New accessoires has been added.');
            
          
    }
    public function updateAccessories(Request $request, $id)
    {
      
    
      $acc=Accessories::find($id);

    $acc->update([
       'name' => $request->acc_title, 
       'stock' =>$request->acc_stock,
       'price' =>$request->acc_price
    ]);
    return $this->responseSuccess($acc,'Accessories updated');

    }
    public function deleteAccessories($id)
    {
      $accessories=Accessories::find($id)->delete();
      return $this->responseSuccess($accessories,'Accessories deleted');
    }
}
