@extends('backend.master')
@section('content')
<div>
  <h1>Breed list</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Breed Name</th>
      <th scope="col">Cost</th>
    
   
     
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($allbreed as $key=>$breed)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$breed->name}}</td>
      <td>{{$breed->cost}}</td>
    
      
      <td>
        <a class="btn btn-success" href="{{route('view.breed',$breed->id)}}">View</a>
        <a class="btn btn-info" href="{{route('edit.breed',$breed->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('delete.breed',$breed->id)}}">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div><a href="{{route('breed.form')}}" class="btn btn-primary">Go to Breed Form</a></div>
</div>

<div>
  {{$allbreed->links()}}
</div>
@endsection