@extends('backend.master')
@section('content')
<form action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Customer name</label>
    <input name="customer_name" required type="text" class="form-control" id="c_name" placeholder="Enter customer name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Customer number</label>
    <input name="customer_number" required type="text" class="form-control" id="c_number" placeholder="Enter customer contact number">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Customer image</label>
    <input name="customer_image" required type="file" class="form-control" id="c_image" placeholder="Enter customer contact number">
    
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection