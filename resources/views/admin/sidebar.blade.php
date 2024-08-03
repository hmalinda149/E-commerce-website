<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">


    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="active"><a href="{{url('redirect')}}"> <i class="icon-home"></i>Home </a></li>
            <li><a href="{{url('view_category')}}"> <i class="icon-grid"></i>Category </a></li>

            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Product </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{url('add_product')}}">Add Product</a></li>
                  <li><a href="{{url('view_product')}}">view Product</a></li>

                </ul>
              </li>
              <li><a href="{{url('order')}}"> <i class="icon-grid"></i>Orders </a></li>
              <li><a href="{{url('view_contact')}}"> <i class="icon-grid"></i>Contact </a></li>



    </ul>

  </nav>
