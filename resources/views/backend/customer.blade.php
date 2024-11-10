@extends('backend.master')
@section('content')
<style>
.a{
    text-align: center;
    font-size: large;
  }
  </style>
<div>
  <h1 class="a"><b>Customer list</b></h1>
<div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      
      <th scope="col">Status</th>
      <!-- <th scope="col">Action</th> -->
    </tr>
  </thead>
  <tbody>
    @foreach($allcustomer as $cus)
    <tr>
      <th scope="row">{{$cus->id}}</th>
      <td>{{$cus->name}}</td>
      <td>{{$cus->number}}</td>
      <td>{{$cus->email}}</td>
      <!-- <td><img src="{{url('/uploads/'.$cus->image)}}" alt="NO IMAGE" width="60"></td> -->
      <td>{{$cus->status}}</td>
      <!-- <td>
        <a class="btn btn-success" href="">View</a>
        <a class="btn btn-info" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
      </td> -->
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<!-- <div><a href="{{route('customer.form')}}" class="btn btn-primary">Go to customer form</a></div> -->

 {{$allcustomer->links()}}
@endsection