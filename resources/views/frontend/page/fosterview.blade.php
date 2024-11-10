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
      <th scope="col">Instruction</th>
      <th scope="col">payment method</th>
      <th scope="col">payment Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
    @foreach($allfoster as $foster)
    <tr>
      <th scope="row">{{$foster->id}}</th>
      
      <td>{{$foster->fdate}}</td>
      <td>{{$foster->tdate}}</td>
      <td>{{$foster->locationRel->location}}</td>
      <td>{{$foster->price}}</td>
      <td>{{$foster->instruction}}</td>
      <td>{{$foster->payment_method}}</td>
      <td>{{$foster->payment_status}}</td>
    @if($foster->payment_method=='online')
     
      <td>
        <a class="btn btn-danger disabled" href="{{route('accept.foster',$foster->id)}}">Cancel</a>
        
      </td>
     
     @endif
     @if($foster->payment_method=='cod')
     <td>
      <a class="btn btn-danger" href="{{route('accept.foster',$foster->id)}}">Cancel</a>
     </td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>

</div>

<div>
  
{{ $allfoster->links() }}
@endsection