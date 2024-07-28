@extends('backend.master')
@section('content')
<h1>this is foster care page</h1>
<div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Foster Name</th>
      <th scope="col">Description</th>
      <th scope="col">Address</th>
      <th scope="col">Per hour Rate</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($allfoster as $fos)
    <tr>
      <th scope="row">{{$fos->id}}</th>
      <td>{{$fos->name}}</td>
      <td>{{$fos->description}}</td>
      <td>{{$fos->address}}</td>
      <td>{{$fos->price}}</td>
      <td><img src="{{url('/uploads/'.$fos->image)}}" alt="" width="60"></td>
      <td>{{$fos->status}}</td>
      <td>
        <a class="btn btn-success" href="">View</a>
        <a class="btn btn-info" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div><a href="{{route('foster.form')}}" class="btn btn-primary">Go to Foster Form</a></div>
</div>
</div>
@endsection