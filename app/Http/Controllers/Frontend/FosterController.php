<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Breed;
use App\Models\Customer;
use App\Models\Foster;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\UploadedFile;


class FosterController
{
    public function form()
    {
        $allfoster=Foster::with('breed','customer')->get();
        $allbreed=Breed::all();
        return view('frontend.page.fosterform',compact('allfoster','allbreed'));
    }

    public function store(Request $request)
    {

        $validation = Validator::make($request->all(),[
            'from_date'=>'required|date|after_or_equal:'.date('Y-m-d'),
            'to_date'=>'required|date|after_or_equal:'.date('Y-m-d'),
            'location'=>'required',
          
            'foster_instruction'=>'required',
            'payment_method'=>'required',
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
    $breed = Breed::find($request->breed_id);
     
       $foster= Foster::create([
           'fdate'=>date('Y-m-d',strtotime($request->from_date)),
           'tdate'=>date('Y-m-d',strtotime($request->to_date)),
           'location'=>$request->location,
           'price'=>$breed->cost * $days,
           'instruction'=>$request->foster_instruction,
           'customer_id'=>auth('customerGuard')->user()->id,
           'payment_method'=>$request->payment_method,
            'breed_id'=>$request->breed_id,
            
           
           
        ]);
     
        
        if($request->payment_method != 'cod')
        {
            $payment=new SslCommerzPaymentController();

        $payment->fosterPay($foster);
            
        }
        if($request->payment_method =='cod')
        {
            $foster->update([
                'payment_status'=>'processing',
            ]);
        }

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





    //for backend
    public function fosterViewListBackend()
    {
        $fosters = Foster::all();
        $breed = Breed::all();
    

        
        return view('backend.page.fosterview',compact('fosters','breed'));
    }
    
    public function fosterEdit($id)
    {
        $fosters = Foster::find($id);
    
        return view('backend.page.editfoster',compact('fosters'));

    }
    public function fosterUpdate(Request $request,$id)
    {
     
        $fosters=Foster::find($id);
        $fosters->update([
           'status'=>$request->status,
        ]);
        notify()->success('foster booking status updated successfully');
        return redirect()->route('view.foster.list');
    }
}
