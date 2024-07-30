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
                        <div class="small mb-1">SKU: BST-498</div>
                        <h1 class="display-5 fw-bolder">{{$singleAccessories->name}}</h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through">{{$singleAccessories->price}} .BDT</span>
                           
                        </div>
                        <p class="lead">description here</p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem">
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </div>
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
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
                
            </div>
        </section>
        </div>
@endsection