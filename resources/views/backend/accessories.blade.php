@extends('backend.master')
@section('content')
<style>
.a{
    text-align: center;
    font-size: large;
  }
  </style>
<div>
  <h1 class="a"><b>Accessories list</b></h1>
  <div><a href="{{route('accessories.form')}}" class="btn btn-primary">Go to Accessories Form</a></div>
<table class="data-table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Accessories Name</th>
      <th scope="col">Description</th>
      <th scope="col">Stock</th>
      <th scope="col">Discount</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      
      <th scope="col">Category ID</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="">
  
  </tbody>
</table>

</div>

<div>
  
</div>

@endsection
@push('js')

<script type="text/javascript">

  $(function () {

    

    var table = $('.data-table').DataTable({

        processing: true,

        serverSide: false,

        ajax: "{{ route('ajax.get.data') }}",

        columns: [

            {data: 'id', name: 'id'},

            {data: 'name', name: 'name'},

            {data: 'description', name: 'description'},
            {data: 'stock', name: 'stock'},
            {data: 'discount', name: 'discount'},
            {data: 'price', name: 'price'},
            {data: 'image', name: 'image'},
            {data: 'category_id', name: 'category_id'},

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

    

  });

</script>

@endpush