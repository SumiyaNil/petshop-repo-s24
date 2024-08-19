@extends('backend.master')
@section('content')
<h1>this is report page for order</h1>
<form class="form-inline my-2 my-lg-0" id="search-form" action="{{route('report')}}">
@csrf
<div class="form-group">
    <label for="exampleInputEmail1">From</label>
    <input value="{{request()->from_date}}" name="from_date" type="date" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your entry date">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">To</label>
    <input value="{{request()->to_date}}" name="to_date" type="date" required class="form-control" id="exampleInputPassword1" placeholder="Enter your return date">
  </div>

<div class="form-group">
    
<button type="submit" class="btn btn-info"><label for="exampleInputPassword1">Search</label></button>
              
            
</div>
  

  </form>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <h1>Order List Report</h1>
      <h4>Date:{{request()->from_date}} to {{request()->to_date}}</h4>
    </div>
    <div class="col-md-4"></div>
  </div>
  <div>
  
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Receiver Name</th>
      <th scope="col">Receiver Email </th>
      <th scope="col">Receiver Mobile</th>
      <th scope="col">Receiver Address</th>
      <th scope="col">Payment method</th>
      
      <th scope="col">Total amount</th>
      <th scope="col"> Order date</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

@foreach ($allorder as $order)
 
<tr>
      <th scope="row">{{$order->id}}</th>
      <td>{{$order->receiver_name}}</td>
      <td>{{$order->receiver_email}}</td>
      <td>{{$order->receiver_mobile}}</td>
      <td>{{$order->receiver_address}}</td>
      <td>{{$order->payment_method}}</td>
   
      <td>{{$order->total_amount}}</td>
      <td>{{$order->created_at}}</td>
      <td>{{$order->status}}</td>
      <td>
        <a class="btn btn-success" href="">View</a>
        <a class="btn btn-info" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
  </table>
  </div>
 
@endsection