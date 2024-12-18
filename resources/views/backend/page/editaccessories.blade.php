@extends('backend.master')
@section('content')
<div>
<h1>Update accessories</h1>

<form action="{{route('accessories.update',$acc->id)}}"method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Accessories name</label>
    <input name="acc_title" value="{{$acc->name}}"  type="name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter accessories">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Accessories description</label>
    <input name="acc_description" type="text" required class="form-control" id="exampleInputPassword1" placeholder="Description">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Stock</label>
    <input name="acc_stock" value="{{$acc->stock}}" type="text" required class="form-control" id="exampleInputPassword1" placeholder="stock details">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Accessories price</label>
    <input name="acc_price" value="{{$acc->price}}"  type="text" required class="form-control" id="exampleInputPassword1" placeholder="price">
  </div>
  <div class="form-group">
    <label for="image">Accessories Image</label>
    <input name="acc_image" type="file" class="form-control" id="image" placeholder="upload Image here">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Discount(%)</label>
    <input name="discount" value="{{$acc->discount}}" type="number" min="0"  class="form-control" id="exampleInputPassword1" placeholder="Enter Discount here">
  </div>
  <select name="category_id" class="form-select" aria-label="Default select example">
      <label for="c_id">Category id</label>
    @foreach ($allCategory as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
     
      
    </select>
  <div>
  <button type="submit" class="btn btn-primary">Submit</button>
   </div>
</form>
</div>
@endsection