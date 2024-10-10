@extends('backend.master')
@section('content')
<h1>this is report page for Foster</h1>
<form class="form-inline my-2 my-lg-0" id="search-form" action="{{route('check.foster.report')}}">
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
      <h1>Foster List Report</h1>
      <h4>Date:{{request()->from_date}} to {{request()->to_date}}</h4>
    </div>
    <div class="col-md-4"></div>
  </div>
  <div>
  
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">From</th>
      <th scope="col">To </th>
      <th scope="col">Customer Name</th>
      <th scope="col">Price</th>
     

    </tr>
  </thead>
  <tbody>

@foreach ($allfoster as $foster)
 
<tr>
      <th scope="row">{{$foster->id}}</th>
      <th scope="row">{{$foster->fdate}}</th>
      <th scope="row">{{$foster->tdate}}</th>
      <th scope="row">{{$foster->customer->name}}</th>
      <th scope="row">{{$foster->price}}.BDT</th>
      
    </tr>
    @endforeach
  </tbody>
  </table>
  </div>
@endsection