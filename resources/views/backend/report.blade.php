@extends('backend.master')
@section('content')



  <div class="row">
    <div class="col-md-2"><a href="{{route('check.order.report')}}" type="button" class="btn btn-success">Order Report</a></div>
    <div class="col-md-2"><a href="{{route('check.foster.report')}}" type="button" class="btn btn-success">Foster Report</a></div>
  </div>
 
 
@endsection