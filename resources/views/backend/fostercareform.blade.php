@extends('backend.master')
@section('content')
<h1> store fosters details form</h1>
<div>
<form action="{{route('foster.store')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Foster name</label>
    <input name="foster_title" type="name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Foster description</label>
    <input name="foster_description" type="text" required class="form-control" id="exampleInputPassword1" placeholder="Enter your foster Description">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input name="foster_address" type="text" required class="form-control" id="exampleInputPassword1" placeholder="Enter your address">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"> Per hour Price</label>
    <input name="foster_price" type="text" required class="form-control" id="exampleInputPassword1" placeholder="Enter per hour rate">
  </div>
  <div class="form-group">
    <label for="image">Foster Image</label>
    <input name="foster_image" type="file" class="form-control" id="image" placeholder="upload Image here">
  </div>
  <div>
  <button type="submit" class="btn btn-primary">Submit</button>
   </div>
</form>
</div> 
</div>
@endsection