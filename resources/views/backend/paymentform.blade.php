@extends('backend.master');
@section('content')
<div>
<form action="{{route('payment.store')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Payment description</label>
    <input name="payment_description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter payment description">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Payment method</label>
    <input name="payment_method" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter payment description">
  </div>
    

  <div class="form-group">
    <label for="exampleInputPassword1">Payment price</label>
    <input name="payment_price" type="text" class="form-control" id="exampleInputPassword1" placeholder="price">
  </div>
  <div>
  <button type="submit" class="btn btn-primary">Submit</button>
   </div>
</form>
</div>

@endsection