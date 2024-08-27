@extends('backend.master')


@section('content')



<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                      
                    <div class="col-md-6">
                     
                        <h1 class="display-5 fw-bolder">{{$breed->name}}</h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration">{{$breed->cost}} .BDT</span>
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>




@endsection