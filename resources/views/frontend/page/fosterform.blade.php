@extends('frontend.master')
@section('content')

<div class="form-group p-5">

<form action="{{route('foster.store')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">From</label>
    <input name="from_date" type="date" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your entry date">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">To</label>
    <input name="to_date" type="date" required class="form-control" id="exampleInputPassword1" placeholder="Enter your return date">
  </div>
  <div class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
    <label for="exampleInputPassword" >Enter Location</label>
    
    <select onchange="location=this.options[this.selectedIndex].value;"  name="location">
         <option value="--Select Location--">Select Location</option>   
          @foreach($location as $local)
          
            <option value="{{$local->id}}">{{$local->location}}</option>
          @endforeach
          </select>
  </div>
  
  <div class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
  <label for="exampleInputPassword1"> Charge </label>
    <select name="foster_price" onchange="location=this.options[this.selectedIndex].value;">
          <option value="--Select Breed--">Select Breed</option>  
          @foreach($allbreed as $breed)
          
            <option value="{{$breed->cost}}">{{$breed->name}} ({{$breed->cost}}. BDT)</option>
          @endforeach
          </select>
    
    
      <!-- @foreach($allbreed as $breed)
      


      <input type="radio" name="foster_price" value="{{$breed->cost}}">
        <label>{{$breed->name}} ({{$breed->cost}} .BDT) </label>
      </input>
      @endforeach
     -->
  </div>

  <h4 class="mb-3">Payment</h4>

<div class="d-block my-3">
  <div class="custom-control custom-radio">
    <input id="credit" name="payment_method" value="cod" type="radio" class="custom-control-input" checked required>
    <label class="custom-control-label" for="credit">Cash on Delivery (COD)</label>
  </div>
  
  <div class="custom-control custom-radio">
    <input id="paypal" name="payment_method" value="online" type="radio" class="custom-control-input" required>
    <label class="custom-control-label" for="paypal">Online Payment</label>
  </div>
</div>


  <div class="form-group">
    <label for="image">Instruction</label>
    <input name="foster_instruction" type="text" class="form-control" id="image" placeholder="enter your instruction for your pet">
  </div>
  
  <div>
  <button type="submit" class="btn btn-primary active">BOOK NOW</button>
   </div>
   <div class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
        <ul style="list-style-type: none;"> 
        <li>
           <!-- anchor trigger modal for terms and condition-->
           <a href="#"   data-toggle="modal" data-target="#termModal">
               Terms and condition
           </a>
         </li>
        </ul>
   </div>    
</form>
</div> 


<div class="modal fade" id="termModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Terms and Condition</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <p>Terms and condition for .....................</p>
      
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
 
    </div>
  </div>
</div>




@endsection