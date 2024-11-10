@extends('backend.master')
@section('content')


    
<h1>{{$title}}</h1>

<div class="row">

<div class="col-md-6">

<form class="form-inline my-2 my-lg-0" id="search-form" action="{{route('check.order.report')}}">
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
    
<button type="submit" class="btn btn-info active text-white"><label for="exampleInputPassword1">Search</label></button>
              
            
</div>
  

  </form>
</div>

<div class="col-md-6">

<form class="form-inline my-2 my-lg-0" id="search-form" action="{{route('check.order.report')}}">
@csrf

<input type="hidden" name="type" value="month">

<div class="form-group">
    <label for="exampleInputEmail1">Select month</label>
    <select name="month" id="" class="form-control">
      <option @if(request()->month=="01") selected @endif value="01">
January
      </option>
      <option @if(request()->month=="02") selected @endif value="02">February</option>
      <option @if(request()->month=="03") selected @endif value="03">March</option>
      <option @if(request()->month=="04") selected @endif value="04">April</option>
      <option @if(request()->month=="05") selected @endif value="05">May</option>
      <option @if(request()->month=="06") selected @endif value="06">June</option>
      <option @if(request()->month=="07") selected @endif value="07">July</option>
      <option @if(request()->month=="08") selected @endif value="08">August</option>
      <option @if(request()->month=="09") selected @endif value="09">September</option>
      <option @if(request()->month=="10") selected @endif value="10">October</option>
      <option @if(request()->month=="11") selected @endif value="11">November</option>
      <option @if(request()->month=="12") selected @endif value="12">December</option>
    </select>
   
  </div>


<div class="form-group">
    
<button type="submit" class="btn btn-info active text-white"><label for="exampleInputPassword1">Search</label></button>
              
            
</div>
  

  </form>
</div>
</div>
<div class="container">
<button class="btn btn-info mt-5 md-5 text-white" onClick="printReport()">Print</button>
    
    <div class="card" id="printArea">

<div class="row">
    <div class="col-md-6">
    
      <h1>Order List Report</h1>
      <h4>Date:{{request()->from_date}} to {{request()->to_date}}</h4>
    </div>
  
  </div>
  
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
     

    </tr>
    
 
    @endforeach
  </tbody>
  </table>
  </div>
  </div>
</div>
<script type="text/javascript">
    function printReport()
    {
        var printContents = document.getElementById("printArea").innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
    }
</script>



<!-- for month -->

@endsection