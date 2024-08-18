@extends('frontend.master')
@section('content')

<form action="{{route('foster.store',)}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">From</label>
    <input name="from_date" type="date" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your entry date">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">To</label>
    <input name="to_date" type="date" required class="form-control" id="exampleInputPassword1" placeholder="Enter your return date">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Enter Location</label>
    <select multiple class="form-control" name="location" id="exampleFormControlSelect2">
            
          @foreach($location as $local)
          
            <option value="{{$local->id}}">{{$local->location}}</option>
          @endforeach
          </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"> Charge</label>
    <input name="foster_price" type="text" required class="form-control" id="exampleInputPassword1" placeholder="Enter charge price">
  </div>
  <div class="form-group">
    <label for="image">Instruction</label>
    <input name="foster_instruction" type="text" class="form-control" id="image" placeholder="enter your instruction for your pet">
  </div>

  <div>
  <button type="submit" class="btn btn-primary" style="color: black;">Submit</button>
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
      </form>
    </div>
  </div>
</div>




@endsection