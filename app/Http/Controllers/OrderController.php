<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Frontend\SslCommerzPaymentController;
use App\Jobs\OrderEmailJob;
use App\Mail\OrderEmail;
use App\Models\Accessories;
use App\Models\Customer;
use App\Models\Foster;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Throwable;

class OrderController
{
    public function order()
    {
        $allorder = Order::paginate(5);
        return view('backend.order',compact('allorder'));
    }
    //backend view order to update
    public function view_order($OID)
    {
        $order = Order::find($OID);
        return view('backend.page.orderview',compact('order'));
    }
    public function delete_order($oid)
    {
       $order = Order::find($oid)->delete();
       notify()->success("Order deleted successfully");
       return redirect()->back();
    }
    public function edit_order($eoid)
    {
        $order = Order::find($eoid);
        return view('backend.page.editorder',compact('order'));
    }
    public function update_order(Request $request,$id)
    {
       $order=Order::find($id);
       $order->update([
        'receiver_name'=>$request->receiver_name,
        'receiver_email'=>$request->receiver_email,
        'receiver_mobile'=>$request->receiver_mobile,
        'receiver_address'=>$request->receiver_address,
        'payment_method'=>$request->payment_method,
        'total_amount'=>$request->total_amount,
        'status'=>$request->status,
       ]);
       notify()->success("order updated successfully");
       return redirect()->route('order.list');
    }






    //report for backend
    public function report()
    {

       return view('backend.report');
    }


    public function orderReport()
     {

        if(request()->type=='month')
        {

            $allorder=Order::whereMonth('created_at', request()->month)->get();

            $title="Order Report by Month";


            return view('backend.page.orderReport',compact('allorder','title'));
            

        }
        
        if(request()->has('from_date') && request()->has('to_date'))
        {
        //  $allorder = Order::whereBetween('created_at',[request()->from_date,request()->to_date])
                        //  ->get();
          $allorder=Order::whereDate('created_at', date('y-m-d',strtotime(request()->from_date)))->
                           whereDate('created_at',date('y-m-d',strtotime(request()->to_date)))->get();
         
                           $title="Order Report by Date";

         
         return view('backend.page.orderReport',compact('allorder','title'));
        }
       
        $title="Order Report - please select date or month";
        $allorder=Order::all();
        return view('backend.page.orderReport',compact('allorder','title'));
     }

     
     public function fosterReport()
     {
       
        if(request()->has('from_date') && request()->has('to_date'))
        {
        $allfoster = Foster::whereBetween('created_at',[request()->from_date,request()->to_date])->get();
         //$allfoster=Foster::whereDate('created_at', date('y-m-d',strtotime(request()->from_date)))->
                         //whereDate('created_at',date('y-m-d',strtotime(request()->to_date)))->get();
       
                         //dd($allfoster);
         
         return view('backend.page.fosterReport',compact('allfoster'));
        }
       
        $allfoster=Foster::all();
        return view('backend.page.fosterReport',compact('allfoster'));
     }

    // public function viewOrder()
    // {
    //     $allorder = Order::all();
    //     return view('backend.order');
    // }

    public function addCart($pID)
    {
        $accessories=Accessories::find($pID);
        if($accessories->stock>0)
        {
        $myCart=session()->get('basket');

        if(empty($myCart))
        {
         
        $cart[$accessories->id]=[
        'acc_id'=>$accessories->id,
        'acc_title' => $accessories->name,
        'acc_description' =>$accessories->description,
        'acc_stock' =>$accessories->stock,
        'acc_price' =>$accessories->price-($accessories->price * ($accessories->discount/100)),
        'quantity'=>1,
        'subtotal'=>1 * ($accessories->price-($accessories->price*($accessories->discount/100))),
        'image' =>$accessories->image,
        'discount'=>$accessories->discount,
        

        ];
        session()->put('basket',$cart);
        notify()->success('Product added to cart.');
        return redirect()->back();
        } else{
            
            
            if(array_key_exists($pID,$myCart)){

                if($accessories->stock>$myCart[$pID]['quantity'])
                {
                $myCart[$pID]['quantity'] = $myCart[$pID]['quantity'] + 1;
                $myCart[$pID]['subtotal'] = $myCart[$pID]['quantity'] * $myCart[$pID]['acc_price'];

                session()->put('basket',$myCart);

                notify()->success('Quantity updated.');
                return redirect()->back();
            }
            else{
                notify()->error('Quantity is not available');
                return redirect()->back();
            }
        }
            else{
                $myCart[$accessories->id]=[
                    'acc_id'=>$accessories->id,
                    'acc_title' => $accessories->name,
                    'acc_description' =>$accessories->description,
                    'acc_stock' =>$accessories->stock,
                    'acc_price' =>$accessories->price-($accessories->price * ($accessories->discount/100)),
                    'quantity'=>1,
                    'subtotal'=>1* ($accessories->price-($accessories->price * ($accessories->discount/100))),
                    'image' =>$accessories->image,
                    'discount'=>$accessories->discount,
                ];
                session()->put('basket',$myCart);
                notify()->success("Product Added to Cart");
                return redirect()->back();
            }
        }
    }else{
        notify()->error('stock is not available');
        return redirect()->back();
    }

    }        
       public function viewcart()
       {
        $myCart=session()->get('basket') ?? [];
        return view('frontend.page.cart',compact('myCart'));
       }


       public function clearCart()
       {
   
         session()->forget('basket');
   
         notify()->success('Cart clear.');
   
         return redirect()->back();
   
       }

   
       public function cartItemDelete($accessoriesID)
       {
           
         $cart=session()->get('basket');
   
          unset($cart[$accessoriesID]);
          session()->put('basket',$cart);
   
          notify()->success('Item remove.');
   
          return redirect()->back();
          
   
       }

       public function checkout()
       {
        return view('frontend.page.checkout');
       }
       
       public function placeOrder(Request $request)
       {

         //validation
         $validation = Validator::make($request->all(),[
            'receiver_name'=>'required|max:20',
            'email'=>'required|email',
            'address'=>'required|max:50',

         ]);
         if($validation->fails())
         {
            notify()->error($validation->getMessageBag());
            return redirect()->back();
         }
        try{

        
         //quary for store data into Orders table
         $cart=session()->get('basket');
         DB::beginTransaction();

          $order =Order::create([
           'receiver_name'=>$request->receiver_name,
           'receiver_email'=>$request->email,
           'receiver_address'=>$request->address,
           'receiver_mobile'=>$request->receiver_mobile,
           'payment_method'=>$request->paymentMethod,
           'customer_id'=>auth('customerGuard')->user()->id,
           'total_amount'=>array_sum(array_column($cart,'subtotal'))
          ]);
          
           

          //order details
         
          foreach($cart as $singleData)
          {

            $accessory=Accessories::find($singleData['acc_id']);

            OrderDetail::create([
               'order_id'=>$order->id,
               'accessories_id'=>$singleData['acc_id'],
               'unit_price'=>$accessory->price,
              'discount'=>$accessory->discount,
               'quantity'=>$singleData['quantity'],
               'subtotal'=>$singleData['subtotal'],
               
               
            ]);
            $accessories=Accessories::find($singleData['acc_id']);
            $accessories->decrement('stock',$singleData['quantity']);
          }
          
          
          DB::commit();
          
         // Mail::to($request->email)->send(new OrderEmail($order));
         dispatch(new OrderEmailJob($request->email,$order)); 

          if($request->paymentMethod != 'cod')
        {
            $payment=new SslCommerzPaymentController();

            $payment->index($order);
            
        }
        if($request->paymentMethod =='cod')
        {
            $order->update([
                'payment_status'=>'processing',
            ]);
            notify()->success('Order place successfully');
            session()->forget('basket');
            return redirect()->route('frontend.home');
        }


    }catch(Throwable $exception){

        DB::rollBack();
        notify()->error($exception->getMessage());

        return redirect()->back();
    }

 }
       //Profile details like invoice and cancel
       public function viewInvoice($order_id)
       {
        $order=Order::with('orderDetails')->find($order_id);
        return view('frontend.page.invoice',compact('order'));
       }

       public function deleteProfileOrder($orderID)
       {
        $order= Order::find($orderID);
        $order->update([
            'status'=>'cancel',
        ]);
         

        $items=OrderDetail::where('order_id',$orderID)->get();
        foreach($items as $item)
        {
            $allaccessories=Accessories::find($item->accessories_id);
            $allaccessories->increment('stock',$item->quantity);

        }
        notify()->success("order cancelled");
        return redirect()->back();
       }

      public function updateCart(Request $request,$id)
      {
        $cart=session()->get('basket');
        $accessories=Accessories::find($id);
        if($accessories->stock >=$request->quantity)
         {
            $cart[$id]['quantity']=$request->quantity;
            $cart[$id]['subtotal']=$request->quantity*$cart[$id]['acc_price'];
            
            session()->put('basket',$cart);
            notify()->success('cart stock updated');
            return redirect()->back();
         }
         else{
            notify()->error('stock is not available');
            return redirect()->back();
         }
      }
    

      //backend invoice
     
}
