@extends('frontend.master')


@section('content')

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">

    @foreach ($allcategory as $acc )
        
     
      <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">

         <a href="{{route('show.accessories',$acc->id)}}">
        <div class="card text-black">
          <img src="{{url('/uploads/'.$acc->image)}}"
            class="card-img-top" alt="iPhone" width="50px" />
          <div class="card-body">
            <div class="text-center mt-1">
              <h4 class="card-title">{{$acc->name}}</h4>
              @if($acc->discount>0)
              <h5 class="mb-1 pb-3">{{$acc->discount}} %</h5>
              @endif

              @if($acc->discount>0)
              
              <h5 class="text-primary mb-1 pb-3"><del>{{$acc->price}} BDT</del></h5>
              
              <h5 class="text-primary mb-1 pb-3">{{($acc->price)-($acc->price/ $acc->discount)}} BDT</h5>
              @else
              <h5 class="text-primary mb-1 pb-3">{{$acc->price}} BDT</h5>
              @endif
              
            </div>
              
              <div class="d-flex flex-column mb-4 lead">
                <span class="mb-2">Description: {{$acc->description}}</span>
                <span class="mb-2">Stock: {{$acc->stock>0 ? $acc->stock : 'Out of Stock'}}</span>
                <span style="color: transparent;">0</span>
              </div>
            </div>
             
            
          </div>

        </div>
        </a>
        <div class="d-flex flex-row">
          @if($acc->stock>0)
              <a href="{{route('add.cart',$acc->id)}}" class="btn btn-primary" color="dark" >
                Add to cart
              </a>
           @else
            <a  disabled href="" class="btn btn-primary" color="dark" >
                Add to cart
              </a>
           @endif
              <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger">Buy now</button>
            </div>
      </div>

      @endforeach
    
    </div>
  </div>
</section>

@endsection