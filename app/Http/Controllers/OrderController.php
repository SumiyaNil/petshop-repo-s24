<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Frontend\SslCommerzPaymentController;
use App\Mail\OrderEmail;
use App\Models\Accessories;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


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
       ]);
       notify()->success("order updated successfully");
       return redirect()->route('order.list');
    }




    //report for backend
    public function report()
    {
       
       if(request()->has('from_date') && request()->has('to_date'))
       {
      $allorder = Order::whereBetween('created_at',[request()->from_date,request()->to_date])->get();
        return view('backend.report',compact('allorder'));
       }
       
       $allorder=Order::all();
       return view('backend.report',compact('allorder'));
    }


    // public function viewOrder()
    // {
    //     $allorder = Order::all();
    //     return view('backend.order');
    // }

    public function addCart($pID)
    {
        $accessories=Accessories::find($pID);
        $myCart=session()->get('basket');


        if(empty($myCart))
        {
        $cart[$accessories->id]=[
        'acc_id'=>$accessories->id,
        'acc_title' => $accessories->name,
        'acc_description' =>$accessories->description,
        'acc_stock' =>$accessories->stock,
        'acc_price' =>$accessories->price,
        'quantity'=>1,
        'subtotal'=>1* $accessories->price,
        'image' =>$accessories->image,
        

        ];
        session()->put('basket',$cart);
        notify()->success('Product added to cart.');
        return redirect()->back();
        } else{
            if(array_key_exists($pID,$myCart)){
                $myCart[$pID]['quantity'] = $myCart[$pID]['quantity'] + 1;
                $myCart[$pID]['subtotal'] = $myCart[$pID]['quantity'] * $myCart[$pID]['acc_price'];

                session()->put('basket',$myCart);

                notify()->success('Quantity updated.');
                return redirect()->back();
            }
            else{
                $myCart[$accessories->id]=[
                    'acc_id'=>$accessories->id,
                    'acc_title' => $accessories->name,
                    'acc_description' =>$accessories->description,
                    'acc_stock' =>$accessories->stock,
                    'acc_price' =>$accessories->price,
                    'quantity'=>1,
                    'subtotal'=>1* $accessories->price,
                    'image' =>$accessories->image,
                ];
                session()->put('basket',$myCart);
                notify()->success("Product Added to Cart");
                return redirect()->back();
            }
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

         //quary for store data into Orders table
         $cart=session()->get('basket');
      
          $order =Order::create([
           'receiver_name'=>$request->receiver_name,
           'receiver_email'=>$request->email,
           'receiver_address'=>$request->address,
           'receiver_mobile'=>'01616666666',
           'payment_method'=>$request->paymentMethod,
           'customer_id'=>auth('customerGuard')->user()->id,
           'total_amount'=>array_sum(array_column($cart,'subtotal'))
          ]);
          
           

          //order details
         
          foreach($cart as $singleData)
          {
            OrderDetail::create([
               'order_id'=>$order->id,
               'accessories_id'=>$singleData['acc_id'],
               'unit_price'=>$singleData['acc_price'],
               'quantity'=>$singleData['quantity'],
               'subtotal'=>$singleData['subtotal'],
               
               
            ]);
          }
          notify()->success('Order place successfully.');
          session()->forget('basket');
          Mail::to($request->email)->send(new OrderEmail($order));


          //initiate payment

          $ssl=new SslCommerzPaymentController;
          $ssl->index($order);



          return redirect()->route('frontend.home');
  

       }
       public function viewInvoice($order_id)
       {
        $order=Order::with('orderDetails')->find($order_id);
        return view('frontend.page.invoice',compact('order'));
       }

    
}
