@extends('backend.master')
@section('content')

<div class="form-group p-5">

<form action="{{route('foster.backend.update',$fosters->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <select name="status" id="" class="form-control">
    <option value="Cancel">Cancel</option>
    <option value="Pending">Pending</option>
    <option value="Processing">Processing</option>
    <option value="confirm">Confirm</option>
  </select>
  <div>
  <button type="submit" class="btn btn-primary active">Submit</button>
   </div>
   
</form>
</div> 







@endsection