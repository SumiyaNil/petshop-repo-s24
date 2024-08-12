<?php

namespace App\Http\Controllers;

use App\Models\Accessories;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController
{
    public function order()
    {
        return view('backend.order');
    }

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
          return redirect()->route('frontend.home');
  

       }
       public function viewInvoice($order_id)
       {
        $order=Order::with('orderDetails')->find($order_id);
        return view('frontend.page.invoice',compact('order'));
       }

    
}
