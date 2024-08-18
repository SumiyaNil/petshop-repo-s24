@extends('backend.master')
@section('content')
<a class="btn btn-primary" href="{{route('location.form')}}">Give location</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Location name</th>
       <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

@foreach ($location as $location)
 
<tr>
      <th scope="row">{{$location->id}}</th>
      <td>{{$location->location}}</td>
   
      <td>
        <a class="btn btn-success" href="">View</a>
        <a class="btn btn-info" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
      </td>
    </tr>

@endforeach
   

    
  </tbody>
</table>

@endsection