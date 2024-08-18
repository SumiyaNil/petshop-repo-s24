<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Pet Shop</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
          <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('dashboard')}}">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('accessories.list')}}">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                Accessories
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('customer.list')}}">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('report')}}">
                <svg class="bi"><use xlink:href="#graph-up"/></svg>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('business.settings')}}">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                Business Settings
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('payment.list')}}">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                Payment
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('order.list')}}">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                order
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('category.list')}}">
                <svg class="bi"><use xlink:href="#puzzle"/></svg>
                Category
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="">
                <svg class="bi"><use xlink:href="#puzzle"/></svg>
                Foster-care
              </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('location.list')}}">
                <svg class="bi"><use xlink:href="#puzzle"/></svg>
                Location
              </a>
            </li>

          </ul>

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('logout')}}">
                <svg class="bi"><use xlink:href="#door-closed"/></svg>
                Sign out
              </a>
            </li>
        </div>
      </div>
    </div>