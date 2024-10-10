@extends('backend.master')


@section('content')



<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <img class="card-img-top mb-5 mb-md-0" src="{{url('/uploads/'.$acc->image)}}" alt="product image" style="width: 300px;"></div>
                    <div class="col-md-6">
                       
                        <h1 class="display-5 fw-bolder">{{$acc->name}}</h1>
                        <div cacc
                            
                       
                        <div class="fs-5 mb-5">
                            @if($acc->discount>0)
                             <p> <span class="text-decoration"><del>{{$acc->price}} .BDT</del>   {{$acc->price - ($acc->price/$acc->discount)}} .BDT</span></p>
                             @else
                             <p> <span class="text-decoration">  {{$acc->price - ($acc->price/$acc->discount)}} .BDT</span></p>
                             @endif
                            <p><span class="text-decoration"> {{$acc->stock}} stock available</span></p>
                           
                        </div>
                        <p class="lead">Description here </p>
                        <p class="lead">{{$acc->description}}</p>
                        
                        </div>
                   
                        
                    </div>
                </div>
            </div>
        </section>




@endsection