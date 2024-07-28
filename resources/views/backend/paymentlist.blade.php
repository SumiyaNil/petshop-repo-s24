@extends('backend.master')
@section('content')

<div>
  <h1>accessories list</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
     <!-- <th scope="col">Customer ID</th>
      <th scope="col">Order ID</th>-->
      <th scope="col">Date</th>
      <th scope="col">Amount</th>
      <th scope="col">Payment Methods</th>
      <!--<th scope="col">Transaction ID</th>
      <th scope="col">Remarks</th>-->
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($allpayment as $pay)
    <tr>
      <th scope="row">{{$pay->id}}</th>
    <!--  <td>{{$pay->customer_id}}</td>
      <td>{{$pay->order_id}}</td>-->
      <td>{{$pay->date}}</td>
      <td>{{$pay->price}}</td>
      <td>{{$pay->payment_method}}</td>
     <!-- <td>{{$pay->transaction_id}}</td>
      <td>{{$pay->remarks}}</td>-->
      <td>{{$pay->status}} active</td>
      <td>
        <a class="btn btn-success" href="">View</a>
        <a class="btn btn-info" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div><a href="{{route('payment.form')}}" class="btn btn-primary">Go to Payment Form</a></div>
</div>

<div>
  {{$allpayment->links()}}
</div>
@endsection