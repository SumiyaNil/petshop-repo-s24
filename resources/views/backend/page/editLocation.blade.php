@extends('backend.master')
@section('content')
<form action="{{route('location.update',$location->id)}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="l_name">Location</label>
    <input value="{{$location->location}}" name="location" required type="text" class="form-control" id="l_name" placeholder="Enter location">
    
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection