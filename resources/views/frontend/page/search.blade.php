@extends('frontend.master')


@section('content')

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
  <p>{{$allaccessories->count()}} Item(s) found for search :"{{request()->search_key}}"</p>
    @foreach ($allaccessories as $acc )
        
     
      <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">

         <a href="{{route('show.accessories',$acc->id)}}">
        <div class="card text-black">
          <img src="{{url('/uploads/'.$acc->image)}}"
            class="card-img-top" alt="iPhone" width="50px" />
          <div class="card-body">
            <div class="text-center mt-1">
              <h4 class="card-title">{{$acc->name}}</h4>
              <h5 class="text-primary mb-1 pb-3">{{$acc->price}} BDT</h5>
            </div>
              
              <div class="d-flex flex-column mb-4 lead">
                <span class="mb-2">{{$acc->description}}</span>
                <span class="mb-2">{{$acc->stock}}</span>
                <span style="color: transparent;">0</span>
              </div>
            </div>
             
            
          </div>

        </div>
        </a>
        <div class="d-flex flex-row">
              <a href="{{route('add.cart',$acc->id)}}" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary flex-fill me-1" data-mdb-ripple-color="dark">
                Add to cart
              </a>
              <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger flex-fill ms-1">Buy now</button>
            </div>
      </div>

      @endforeach
    
    </div>
  </div>
</section>

@endsection