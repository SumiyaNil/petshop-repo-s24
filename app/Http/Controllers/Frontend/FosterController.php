<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Breed;
use App\Models\Foster;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\UploadedFile;


class FosterController
{
    public function form()
    {
        $allfoster=Foster::with('breed')->get();
        $allbreed=Breed::all();
        return view('frontend.page.fosterform',compact('allfoster','allbreed'));
    }

    public function store(Request $request)
    {

        $validation = Validator::make($request->all(),[
            'from_date'=>'required|date',
            'to_date'=>'required|date',
            'location'=>'required',
            'foster_price'=>'required',
            'foster_instruction'=>'required',
        ]);
        if($validation->fails())
        {
            notify()->error($validation->getMessageBag());
            return redirect()->back();
        }

    $fdate=$request->from_date;
    $tdate=$request->to_date;

    $start = Carbon::parse(date('Y-m-d',strtotime($fdate)));
    $end = Carbon::parse(date('Y-m-d',strtotime($tdate)));
   

    $days = (int)$start->diffInDays($end);

       // dd($request->all());
        Foster::create([
           'fdate'=>date('Y-m-d',strtotime($request->from_date)),
           'tdate'=>date('Y-m-d',strtotime($request->to_date)),
           'location'=>$request->location,
           'price'=>$request->foster_price * $days,
           'instruction'=>$request->foster_instruction,
           'customer_id'=>auth('customerGuard')->user()->id,
        ]);
    
        
        return redirect()->route('view.foster');
    }
    public function viewfoster()
    {
        
        $allfoster=Foster::where('customer_id',auth('customerGuard')->user()->id)->paginate(5);
        $fostercount = count($allfoster);
     
        return view('frontend.page.fosterview',compact('allfoster','fostercount'));
        //query

    }
    public function acceptFoster($id)
    {
        $allfoster=Foster::find($id);
        
        $allfoster->update([
            'status'=>'cancel'
            
        ]);
        notify()->success('Your request cancelled');
        return redirect()->back();
    }
}
