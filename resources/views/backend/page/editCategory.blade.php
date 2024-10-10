@extends('backend.master')


@section('content')
<h1>Category Form</h1>



<form action="{{route('category.update',$allCategory->id)}}" method="post">
@csrf
  <div class="form-group">
    <label for="name">Enter Category Name</label>
    <input name="cat_name" value="{{$allCategory->name}}"  required type="text" class="form-control" id="name" placeholder="Enter Category Name">
  </div>

  <div class="form-group" style="margin-top: 10px;">
    <label for="name">Enter Description</label>
   <input class="form-control" value="{{$allCategory->description}}"  name="cat_description" id="" placeholder="Enter Description">
  </div>





  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection