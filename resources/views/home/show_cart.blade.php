<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <!-- Bootstrap CSS -->
		<link href="new/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="new/css/tiny-slider.css" rel="stylesheet">
		<link href="new/css/style.css" rel="stylesheet">


   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <section class="inner_page_head">
            <div class="container_fuild">
               <div class="row">
                  <div class="col-md-12">
                     <div class="full">
                        <h3>Cart</h3>
                     </div>
                  </div>
               </div>
            </div>
         </section>

         @if (session()->has('message'))

            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    x
                </button>
                {{session()->get('message')}}
            </div>

        @endif



      <div class="untree_co-section before-footer-section">
        <div class="container">
          <div class="row mb-5">
            <form class="col-md-12" method="post">
              <div class="site-blocks-table">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="product-thumbnail">Image</th>
                      <th class="product-name">Product</th>
                      <th class="product-price">Quantity</th>
                      <th class="product-quantity">Price</th>

                      <th class="product-remove">Remove</th>
                    </tr>
                  </thead>

                  <?php $totalprice = 0; ?>

                  @foreach ($cart as $cart)

                  <tbody>
                    <tr>
                      <td class="product-thumbnail">
                        <img src="/products/{{$cart->image}}" alt="Image" class="img-fluid">
                      </td>
                      <td class="product-name">
                        <h2 class="h5 text-black">{{$cart->product_title}}</h2>
                      </td>
                      <td>

                        {{$cart->quantity}}
                      </td>

                      <td>{{$cart->price}}</td>


                      <td><a href="{{url('remove_cart',$cart->id)}}" class="btn btn-black btn-sm" onclick="return confirm('Are you sure to delete this product ?')">X</a></td>
                    </tr>



                  </tbody>

                  <?php $totalprice = $totalprice + $cart->price ?>

                  @endforeach

                </table>
              </div>
            </form>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="row mb-5">


              </div>
              <div class="row">



              </div>
            </div>
            <div class="col-md-6 pl-5">
              <div class="row justify-content-end">
                <div class="col-md-7">
                  <div class="row">
                    <div class="col-md-12 text-right border-bottom mb-5">
                      <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                    </div>
                  </div>

                  <div class="row mb-5">
                    <div class="col-md-6">
                      <span class="text-black">Total</span>
                    </div>
                    <div class="col-md-6 text-right">
                      <strong class="text-black">LKR {{$totalprice}}</strong>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                        <a href="{{url('cash_on_deli')}}" class="btn btn-black btn-lg py-3 btn-block">Cash on Delivery</a>
                        <a href="{{url('stripe',$totalprice)}}" class="btn btn-black btn-lg py-3 btn-block">Pay Using Card</a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
        <p class="mx-auto">© 2024 All Rights Reserved.

        </p>
     </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>

        <script src="new/js/bootstrap.bundle.min.js"></script>
		<script src="new/js/tiny-slider.js"></script>
		<script src="new/js/custom.js"></script>
   </body>
</html>
