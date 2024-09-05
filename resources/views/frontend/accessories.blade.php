@extends('frontend.master')


@section('content')

<section style="background-color: #eee;">
<section id="clothing" class="my-5 overflow-hidden">
  <div class="container pb-5">
    <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
      <h2 class="display-3 fw-normal">Accessories</h2>
    </div>

    <div class="products-carousel swiper">
      <div class="swiper-wrapper d-flex">

        <div class="swiper-slide">
         

          <div class="card">
            <div class="row">
              <div class="col-md-12 flex">

              @foreach ($allaccessories as $acc)
    
              <div class="col-md-4">
              @if($acc->discount > 0)
          <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            {{$acc->discount}} %
          </div>
          @endif

          <a href="{{route('show.accessories',$acc->id)}}">
                  <div class="card text-black">
                    <img src="{{url('/uploads/'.$acc->image)}}" class="card-img-top" alt="iPhone" width="50px" style="height: 250px;" />
                    <div class="card-body">
                      <div class="text-center mt-1">
                        <h4 class="card-title">{{$acc->name}}</h4>
                        <div class="card-text">
                          <h3 class="secondary-font text-primary">
                            @if($acc->discount > 0)
                            <h5 class="text-primary mb-1 pb-3">
                              <del>{{$acc->price}} BDT</del>
                            </h5>
                            <h5 class="text-primary mb-1 pb-3">
                              {{($acc->price) - ($acc->price / $acc->discount)}} BDT
                            </h5>
                            @else
                            <h5 class="text-primary mb-1 pb-3">{{$acc->price}} BDT</h5>
                            @endif
                          </h3>
                        </div>
                      </div>
                      
                      <div class="d-flex flex-column mb-4 lead">
                        <span class="mb-2">Description: {{$acc->description}}</span>
                        <span class="mb-2">Stock: {{$acc->stock > 0 ? $acc->stock : 'Out of Stock'}}</span>
                        <span style="color: transparent;">0</span>
                      </div>
                    </div>
                  </div>
                </a>
                <div class="d-flex flex-wrap mt-3">
              @if($acc->stock > 0)
              <a href="{{route('add.cart',$acc->id)}}" class="btn btn-primary" color="dark">
                Add to cart
              </a>
              @else
              <a disabled href="" class="btn btn-primary" color="dark">
                Add to cart
              </a>
              @endif
              <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger">
                Buy now
              </button>
            </div>

              </div>

@endforeach

                
              </div>
            </div>

            
          </div>
        </div>

      </div>
    </div>
   
  </div>
</section>

</section>

@endsection