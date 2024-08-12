<header>
    <div class="container py-2">
      <div class="row py-4 pb-0 pb-sm-4 align-items-center ">

        <div class="col-sm-4 col-lg-3 text-center text-sm-start">
          <div class="main-logo">
            <a href="index.html">
              <img src="{{url('frontend/images/logo.png')}}" alt="logo" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">
          <div class="search-bar border rounded-2 px-3 border-dark-subtle">
            <form id="search-form" class="text-center d-flex align-items-center" action="{{route('search')}}" method="">
              <input type="text" name="search_key" class="form-control border-0 bg-transparent" placeholder="Search here" />
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor"
                  d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
              </svg>
            </form>
          </div>
        </div>
        @guest('customerGuard')
        <div class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
        <ul style="list-style-type: none;"> 
        <li>
           <!-- anchor trigger modal for registration-->
           <a href="#"   data-toggle="modal" data-target="#regModal">
               Registration
           </a>
         </li>
         <li>
          <a href="#" data-toggle="modal" data-target="#loginModal">Login</a>
         </li>
        </ul>

        </div>
        @endguest

        @auth('customerGuard')
        
        <!-- <a href="" class="mx-3">
          <img src="/uploads/.auth('customerGuard')->user()->image" alt="">
        </a> -->
        <li>
          <a type="" class="mx-3" href="{{route('profile.page')}}">
            {{auth('customerGuard')->user()->name}}
          </a>
        </li>
        <li>
          <a href="{{route('frontend.logout')}}" class="mx-3">Logout</a>
        </li>

        @endauth
      </div>
    </div>

    <div class="container-fluid">
      <hr class="m-0">
    </div>

    <div class="container">
      <nav class="main-menu d-flex navbar navbar-expand-lg ">

        <div class="d-flex d-lg-none align-items-end mt-3">
          <ul class="d-flex justify-content-end list-unstyled m-0">
            <li>
              <a href="account.html" class="mx-3">
                <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
              </a>
            </li>
            <li>
              <a href="wishlist.html" class="mx-3">
                <iconify-icon icon="mdi:heart" class="fs-4"></iconify-icon>
              </a>
            </li>

            <li>
              <a href="{{route('view.cart')}}" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                aria-controls="offcanvasCart">
                <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
                <span class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                  
                </span>
              </a>
            </li>

            <li>
              <a href="#" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch"
                aria-controls="offcanvasSearch">
                <iconify-icon icon="tabler:search" class="fs-4"></iconify-icon>
                </span>
              </a>
            </li>
          </ul>

        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

          <div class="offcanvas-header justify-content-center">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>

          <div class="offcanvas-body justify-content-between">
            <select class="filter-categories border-0 mb-0 me-5">
              <option>Shop by Category</option>
              <option>Cat</option>
              <option>Bird</option>
              <option>Dog</option>
              <option>Fish</option>
              
            </select>

            <ul class="navbar-nav menu-list list-unstyled d-flex gap-md-3 mb-0">
              <li class="nav-item">
                <a href="{{route('frontend.home')}}" class="nav-link active">Home</a>
              </li>
              <li class="nav-item">
                <a href="{{route('frontend.accessories')}}" class="nav-link" >Accessories</a>
                <!-- <ul class="dropdown-menu" aria-labelledby="pages">
                  <li><a href="about.html" class="dropdown-item">About Us<span
                        class="badge bg-success text-dark ms-2">Services</span></a></li>
                  <li><a href="shop.html" class="dropdown-item">Shop<span
                        class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="single-product.html" class="dropdown-item">Single Product<span
                        class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="cart.html" class="dropdown-item">Cart<span
                        class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="wishlist.html" class="dropdown-item">Wishlist<span
                        class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="checkout.html" class="dropdown-item">Checkout<span
                        class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="blog.html" class="dropdown-item">Blog<span
                        class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="single-post.html" class="dropdown-item">Single Post<span
                        class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="contact.html" class="dropdown-item">Contact<span
                        class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="faqs.html" class="dropdown-item">FAQs<span
                        class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="account.html" class="dropdown-item">Account<span
                        class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="thank-you.html" class="dropdown-item">Thankyou<span
                        class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="error.html" class="dropdown-item">Error 404<span
                        class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="styles.html" class="dropdown-item">Styles<span
                        class="badge bg-success text-dark ms-2">PRO</span></a></li>
                </ul> -->
              </li>
              <li class="nav-item">
                <a href="shop.html" class="nav-link">Order</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">Foster</a>
              </li>
              <li class="nav-item">
                <a href="contact.html" class="nav-link">Payment</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">Others</a>
              </li>
              <li class="nav-item">
                <a href="https://templatesjungle.gumroad.com/l/waggy-pet-shop-ecommerce-html-website-template" class="nav-link fw-bold text-dark" target="_blank">GET PRO</a>
              </li>
            </ul>

            <div class="d-none d-lg-flex align-items-end">
              <ul class="d-flex justify-content-end list-unstyled m-0">
                <li>
                  <a href="account.html" class="mx-3">
                    <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
                  </a>
                </li>
                <li>
                  <a href="wishlist.html" class="mx-3">
                    <iconify-icon icon="mdi:heart" class="fs-4"></iconify-icon>
                  </a>
                </li>
               <!-- cart -->
                <li class="">
                  <a href="{{route('view.cart')}}" >
                    <!-- class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" -->
                    <!-- aria-controls="offcanvasCart" -->
                    <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
                    <span class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                                   
                    </span>
                  </a>
                </li>
              </ul>
              <div class="cart-text">



<br>

<!-- @php 
if(session()->has('basket')){
    echo count(session()->get('basket'));
}else{
    echo 0;
}
@endphp -->

<!-- @if (session()->has('basket'))

{{ count(session()->get('basket')) }} 

@else
0
@endif -->

<!-- ternary operator -->

<!-- (condition) ? if block : else block -->
@if(session()->has('basket'))

{{ count(session()->get('basket')) }} item(s) - {{ array_sum(array_column(session()->get('basket'),'subtotal')) }}

@else

0 item(s)

@endif

            </div>

          </div>

        </div>

      </nav>



    </div>
  </header>
  <!-- Modal -->
<div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="{{route('frontend.register')}}"  method="post">
       
      @csrf
        <div class="modal-body">
          <div>
            <label for="">Enter your name:</label>
            <input required type="text" name="customer_name" placeholder="Enter your name" class="form-control">
          </div>

          <div>
            <label for="">Enter your email:</label>
            <input required type="email" name="email" placeholder="Enter your email" class="form-control">
          </div>

          <div>
            <label for="">Enter your password:</label>
            <input required type="password" name="password" placeholder="Enter your password" class="form-control">
          </div>


          <div>
            <label for="">Retype your password:</label>
            <input required type="password" name="password_confirmation" placeholder="Retype your password" class="form-control">
          </div>

          <div>
            <label for="">Enter your Mobile Number:</label>
            <input required type="text" name="mobile_number" placeholder="Enter your Mobile number" class="form-control">
          </div>
        <!-- image -->
          <!-- <div>
            <label for="">Enter your image</label>
            <input required type="file" name="customer_image" placeholder="Enter your customer image" class="form-control">
          </div> -->
 
 
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Register now</button>
      </div>
      </form>
    </div>
  </div>
</div>



 <!--login Modal -->
 <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="{{route('frontend.login')}}"  method="post">
       
      @csrf
        <div class="modal-body">
         

          <div>
            <label for="">Enter your email:</label>
            <input required type="email" name="email" placeholder="Enter your email" class="form-control">
          </div>

          <div>
            <label for="">Enter your password:</label>
            <input required type="password" name="password" placeholder="Enter your password" class="form-control">
          </div>


          
 
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">login</button>
      </div>
      </form>
    </div>
  </div>
</div>



