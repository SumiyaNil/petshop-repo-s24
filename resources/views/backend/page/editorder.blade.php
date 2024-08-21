@extends('backend.master')
@section('content')
<div>
<h1>Update Order</h1>

<form action="{{route('order.update',$order->id)}}"method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Receiver name</label>
    <input name="receiver_name" type="name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Receiver name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Receiver Email</label>
    <input name="receiver_email" type="email" class="form-control" id="exampleInputPassword1" placeholder="Receiver email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Receiver mobile</label>
    <input name="receiver_mobile" type="text"  class="form-control" id="exampleInputPassword1" placeholder="Receiver mobile">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Receiver Address</label>
    <input name="receiver_address" type="text"  class="form-control" id="exampleInputPassword1" placeholder="Receiver address">
  </div>
  <div class="form-group">
    <label for="">Payment Method</label>
    <input name="payment_method" type="text" class="form-control" id="" placeholder="payment method">
  </div>
  
  <div class="form-group">
    <label for="">Payment status</label>
    <input name="payment_status" type="text" class="form-control" id="" placeholder="payment method">
  </div>
  <div class="form-group">
    <label for="">Total amount</label>
    <input name="total_amount" type="text" class="form-control" id="" placeholder="payment method">
  </div> 
      

  <div>
  <button type="submit" class="btn btn-primary">Submit</button>
   </div>
</form>
</div>
@endsection