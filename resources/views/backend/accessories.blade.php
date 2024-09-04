@extends('backend.master')
@section('content')
<div>
  <h1>accessories list</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Accessories Name</th>
      <th scope="col">Description</th>
      <th scope="col">Stock</th>
      <th scope="col">Discount</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">Category ID</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($allaccessories as $key=>$acc)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$acc->name}}</td>
      <td>{{$acc->description}}</td>
      <td>{{$acc->stock}}</td>
      <td>{{$acc->discount}}</td>
      <td>{{$acc->price}}</td>
      <td><img src="{{url('/uploads/'.$acc->image)}}" alt="" width="60"></td>
      <td>{{$acc->status}} active</td>
      <td>{{$acc->category->name}}</td>
      <td>
        <a class="btn btn-success" href="{{route('accessories.view',$acc->id)}}">View</a>
        <a class="btn btn-info" href="{{route('accessories.edit',$acc->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('accessories.delete',$acc->id)}}">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div><a href="{{route('accessories.form')}}" class="btn btn-primary">Go to Accessories Form</a></div>
</div>

<div>
  {{$allaccessories->links()}}
</div>
@endsection