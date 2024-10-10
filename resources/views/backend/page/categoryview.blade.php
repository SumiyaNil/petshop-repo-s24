@extends('backend.master')
@section('content')
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    
                      
                    
                     <h1 class="display-5 fw-bolder"> Each category page</h1>
                        
                        <div class="fs-5 mb-5">
                        <span class="text-decoration">Category Name: {{$allCategory->name}}</span><br>
                            <span class="text-decoration">Category Description: {{$allCategory->description}}</span>
                           
                        </div>
                        
                  
                </div>
            </div>
        </section>
   
@endsection