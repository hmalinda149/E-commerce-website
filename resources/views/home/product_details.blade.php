<!DOCTYPE html>
<html>
   <head>

    <base href="/public">
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

      {{-- css links --}}

      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
      <link rel="stylesheet" href="neww/fonts/icomoon/style.css">

      <link rel="stylesheet" href="neww/css/bootstrap.min.css">
      <link rel="stylesheet" href="neww/css/magnific-popup.css">
      <link rel="stylesheet" href="neww/css/jquery-ui.css">
      <link rel="stylesheet" href="neww/css/owl.carousel.min.css">
      <link rel="stylesheet" href="neww/css/owl.theme.default.min.css">


      <link rel="stylesheet" href="neww/css/aos.css">

      <link rel="stylesheet" href="neww/css/style.css">

        <style>



        </style>



   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

         @if (session()->has('message'))

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            x
                        </button>
                        {{session()->get('message')}}
                    </div>

        @endif


         <div class="site-section">
            <div class="container">
              <div class="row">
                <div class="col-md-5">
                  <img src="products/{{$product->image}}" alt="Image" class="img-fluid">
                </div>

                <div class="col-md-6">
                    <br><br>
                  <h2 class="text-black">Product Name : {{$product->title}}</h2>
                  <br>
                  <h2>Product Category ; {{$product->category}}</h2>
                  <br>
                  <p class="mb-4">Description : {{$product->description}}</p>

                  <div class="input-group mb-3">

                     <p>
                        @if ($product->discount_price!=null)

                       <strong class="text-primary h4">LKR {{$product->discount_price}}</strong>
                       &nbsp;&nbsp;
                       <strong class="text-primary h4"><s>LKR {{$product->price}}</s></strong>

                       @else
                       <strong class="text-primary h4">LKR {{$product->price}}</strong>
                       @endif
                     </p>
                  </div>

                  <div>
                    @if($product->quantity > 0)
                    <label for="" class="badge bg-success"><p style="color: white; font-size:25px;">In Stock</p></label>
                    @else
                    <label for="" class="badge bg-danger"><p style="color: white; font-size:15px;">Out Of Stock</p></label>
                    @endif
                  </div>



                  <div class="mb-5">
                     <form action="{{url('add_cart',$product->id)}}" method="POST">
                        @csrf

                     <div class="input-group mb-3" style="max-width: 120px;">
                       <input type="number" class="form-control text-center" name="quantity" value="1" min="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                     </div>
                     <div class="input-group mb-3">

                        @if ($product->quantity > 0)

                        <p><input type="submit" value="Add to Cart" class="btn btn-primary"></p>

                        @endif

                     </div>

                  </form>
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

      {{-- custom js --}}

      <script src="neww/js/jquery-3.3.1.min.js"></script>
      <script src="neww/js/jquery-ui.js"></script>
      <script src="neww/js/popper.min.js"></script>
      <script src="neww/js/bootstrap.min.js"></script>
      <script src="neww/js/owl.carousel.min.js"></script>
      <script src="neww/js/jquery.magnific-popup.min.js"></script>
      <script src="neww/js/aos.js"></script>

      <script src="neww/js/main.js"></script>

   </body>
</html>
