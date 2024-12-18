@extends('frontend.master')


@section('content')

<!-- single accessories view section -->
 <div class="row">
    
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <img class="card-img-top mb-5 mb-md-0" src="{{url('/uploads/'.$singleAccessories->image)}}" alt="product image" style="width: 300px;"></div>
                    <div class="col-md-6">
                    
                        <h1 class="display-5 fw-bolder">{{$singleAccessories->name}}</h1>
                        <div class="fs-5 mb-5">
                            @if($singleAccessories->discount>0)
                             <p> <span class="text-decoration"><del>{{$singleAccessories->price}} .BDT</del>   {{$singleAccessories->price - ($singleAccessories->price*($singleAccessories->discount/100))}} .BDT</span></p>
                             @else
                             <p> <span class="text-decoration">  {{$singleAccessories->price - ($singleAccessories->price*($singleAccessories->discount/100))}} .BDT</span></p>
                             @endif
                            <p><span class="text-decoration"> {{$singleAccessories->stock}} stock available</span></p>
                           
                        </div>
                        <p class="lead">Description </p>
                        <p class="lead">{{$singleAccessories->description}}</p>
                        
                        
                        @if($singleAccessories->stock>0)
                            <div class="d-flex flex-row">
                             <a href="{{route('add.cart',$singleAccessories->id)}}" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary active" style="color:black;">
                              Add to cart
                             </a>
                          
                            </div>
                        @else
                        <div class="d-flex flex-row">
                             <a disabled href="" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary" style="color:black;">
                              Add to cart
                             </a>
                          
                            </div>
                        @endif
                    </div class="d-flex flex-row">
                    <ul style="text-decoration: none;">

                    <li>
                <!-- <a href="" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary active">
                      <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                    </a> -->
                </li>
                    </ul>
                </div>
            </div>
        </section>

<!-- related Accessories section -->
<section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related Accessories</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                
                @foreach ($relatedAccessories as $ra )
                    
               
                <div class="col-md-3">
                        <div class="card h-100">
                            <!--  accessories image-->
                            <img class="card-img-top" src="{{url('/uploads/'.$ra->image)}}" alt="..." style="width: 200px;height:200px;">
                            <!-- accessories details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- accessories name-->
                                    <h5 class="fw-bolder">{{$ra->name}}</h5>
                                    <!-- Accessories price-->
                                   {{ $ra->price }} .BDT
                                </div>
                            </div>
                            <!-- accessories actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('show.accessories',$ra->id)}}">View</a></div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
                
            </div>
        </section>
        </div>
@endsection