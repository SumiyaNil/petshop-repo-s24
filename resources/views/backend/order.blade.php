@extends('backend.master')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Receiver Name</th>
      <th scope="col">Receiver Email </th>
      <th scope="col">Receiver Mobile</th>
      <th scope="col">Receiver Address</th>
      <th scope="col">Payment method</th>
      <th scope="col">Payment status</th>
      <th scope="col">Total amount</th>
      <th scope="col">Order date</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

@foreach ($allorder as $key=>$order)
 
<tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$order->receiver_name}}</td>
      <td>{{$order->receiver_email}}</td>
      <td>{{$order->receiver_mobile}}</td>
      <td>{{$order->receiver_address}}</td>
      <td>{{$order->payment_method}}</td>
      <td>{{$order->payment_status}}</td>
      <td>{{$order->total_amount}} .BDT</td>
      <td>{{$order->created_at}}</td>
      <td>{{$order->status}}</td>
      <td>
        <a class="btn btn-success" href="{{route('order.view', $order->id)}}">View</a>
        <a class="btn btn-info" href="{{route('order.edit',$order->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('order.delete',$order->id)}}">Delete</a>
      </td>
    </tr>
    @endforeach
@endsection