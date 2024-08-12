@extends('frontend.master')
@section('content')

<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		
<h1>My Orders ({{ $orders->count() }})</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Order Number</th>
      <th scope="col">Receiver Name</th>
      <th scope="col">Total Price</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orders as $order)
    <tr>
      <th scope="row">{{$order->id}}</th>
      <th scope="row">{{$order->receiver_name}}</th>
      <td>{{$order->total_amount}}</td>
      <td>{{$order->status}}</td>
      <td>
        <a href="{{route('view.invoice',$order->id)}}">View Order</a>
      </td>
    </tr>
    @endforeach
    
   
  </tbody>
</table>

	</div>
</div>
</div>
</div>

@endsection