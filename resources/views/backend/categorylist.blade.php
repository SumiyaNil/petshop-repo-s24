@extends('backend.master')
@section('content')

<style>
.a{
    text-align: center;
    font-size: large;
  }
  </style>
<div>
  <h1 class="a"><b>Category list</b></h1>



<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Name</th>
      <th scope="col">Description</th>
    
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

@foreach ($allCategory as $cat)
 
<tr>
      <th scope="row">{{$cat->id}}</th>
      <td>{{$cat->name}}</td>
      <td>{{$cat->description}}</td>
      
      <td>
        <a class="btn btn-success" href="{{route('category.view',$cat->id)}}">View</a>
        <a class="btn btn-info" href="{{route('category.edit',$cat->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('category.delete',$cat->id)}}">Delete</a>
      </td>
    </tr>

@endforeach
   

    
  </tbody>
</table>
<a class="btn btn-primary" href="{{route('category.form')}}">Create Category</a>

{{ $allCategory->links() }}


@endsection