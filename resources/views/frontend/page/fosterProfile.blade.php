@extends('frontend.master')
@section('content')
<div>
  <h1>Foster request list</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">From date</th>
      <th scope="col">To date</th>
      <th scope="col">Location</th>
      <th scope="col">Charge</th>
    
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
    @foreach($fosters as $key=>$foster)
    <tr>
      <th scope="row">{{$key+1}}</th>
      
      <td>{{$foster->fdate}}</td>
      <td>{{$foster->tdate}}</td>
      <td>{{$foster->locationRel->location}}</td>
      <td>{{$foster->price}}</td>
      
      <td>{{$foster->status}} pending</td>
    @if($foster->status=='pending')
     {
      <td>
        <a class="btn btn-danger" href="{{route('accept.foster',$foster->id)}}">Cancel</a>
        
      </td>
     }
     @endif
    </tr>
    @endforeach
  </tbody>
</table>

</div>

<div>
  
@endsection