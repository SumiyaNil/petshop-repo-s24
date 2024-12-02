@extends('backend.master')
@section('content')

<style>
.a{
    text-align: center;
    font-size: large;
  }
  </style>

  <h1 class="a"><b>Location list</b></h1>
  <h1>{{$title}}</h1>
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
        
        <a class="btn btn-info" href="{{route('location.edit',$location->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('location.delete',$location->id)}}">Delete</a>
      </td>
    </tr>

@endforeach
   

    
  </tbody>
</table>

@endsection