@extends('backend.master')
@section('content')
<style>
.a{
    text-align: center;
    font-size: large;
  }
  </style>
<div>
  <h1 class="a"><b>Foster booking list</b></h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">From date</th>
      <th scope="col">To date</th>
      <th scope="col">Location</th>
      <th scope="col">Customer</th>
      <th scope="col">Breed type</th>
      <th scope="col">Charge</th>
      <th scope="col">Payment Method</th>
      <th scope="col">Payment status</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
    @foreach($fosters as $foster)
    <tr>
      <th scope="row">{{$foster->id}}</th>
      
      <td>{{$foster->fdate}}</td>
      <td>{{$foster->tdate}}</td>
      <td>{{$foster->locationRel->location}}</td>
      <td>{{$foster->customer->name}}</td>
      <td>{{$foster->breed->name}}</td>
      <td>{{$foster->price}}.BDT</td>
      <td>{{$foster->payment_method}}</td>
      <td>{{$foster->payment_status}}</td>
      <td>{{$foster->status}}</td>
    <!-- @if($foster->status=='proccessing')
     
      <td>
        <a class="btn btn-danger" href="{{route('accept.foster',$foster->id)}}">Cancel</a>
        
      </td>
     
     @endif -->
      <td>
     
        <a href="{{route('foster.backend.edit',$foster->id)}}" class="btn btn-success">Update status</a>
    
      </td>

    </tr>
    @endforeach
  </tbody>
</table>

</div>

<div>
  


@endsection