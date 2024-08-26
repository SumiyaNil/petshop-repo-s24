@extends('backend.master')
@section('content')
<div>
<form action="{{route('breed.store')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Breed name</label>
    <input name="breed_name" type="name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter breed name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Cost</label>

   <select name="cost" id="" type="radio">
    <option value="1">Local(100.BDT)</option>
    <option value="2">Persian(500.BDT)</option>
   </select>
  </div>
 
      
    
  <div>
  <button type="submit" class="btn btn-primary">Submit</button>
   </div>
</form>
</div>

@endsection