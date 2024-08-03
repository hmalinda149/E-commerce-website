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
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body class="sub_page">
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item ">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" href="{{url('all_products')}}">Products</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/about')}}">About</a>
                        </li>






                        @if (Route::has('login'))
                        @auth

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('show_cart')}}"><i class="fa fa-shopping-cart"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('show_order')}}"><i class="fa fa-shopping-bag"></i></a>
                        </li>

                        <li class="nav-item">
                            <x-app-layout>

                            </x-app-layout>

                         </li>

                         @else

                        <li class="nav-item">
                            <a class="btn btn-success" id="logbtn" href="{{ route('login') }}">Login</a>
                         </li>
                         <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                         </li>
                         @endauth
                         @endif
                     </ul>
                  </div>
               </nav>
            </div>
         </header>

         <!-- end header section -->
      </div>
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Contact Us</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <section class="why_section layout_padding">
        <div class="container">

           <div class="row">
              <div class="col-md-4">
                 <div class="box " style="background-color: rgb(32, 22, 22)">
                    <div class="img-box">
                        <h3 style="font-size:25px" >
                            Contact Number
                         </h3>

                    </div>
                    <div class="detail-box">

                       <p>
                        +91 987 654 3210
                       </p>
                    </div>
                 </div>
              </div>
              <div class="col-md-4">
                 <div class="box " style="background-color: rgb(32, 22, 22)">
                    <div class="img-box">
                        <h3 style="font-size:25px">
                            Email
                        </h3>

                    </div>
                    <div class="detail-box">
                       <p>
                        admin@gmail.com
                       </p>
                    </div>
                 </div>
              </div>
              <div class="col-md-4">
                 <div class="box" style="background-color: rgb(32, 22, 22)">
                    <div class="img-box" >
                        <h3 style="font-size:25px">
                           Address
                         </h3>
                    </div>
                    <div class="detail-box">
                       <p>
                        Matara Road,Ahangama.
                       </p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>

      <!-- why section -->
      <section class="why_section layout_padding">
        <div class="container">

           <div class="row">
              <div class="col-lg-8 offset-lg-2">
                 <div class="full">
                    <form action="{{url('add_contact')}}" method="POST">
                        @csrf
                       <fieldset>
                          <input type="text" placeholder="Enter your full name" name="name" required />
                          <input type="email" placeholder="Enter your email address" name="email" required />
                          <input type="text" placeholder="Enter subject" name="subject" required />
                          <textarea placeholder="Enter your message" required name="message"></textarea>
                          <input type="submit" value="Submit"/>
                       </fieldset>
                    </form>
                 </div>
              </div>
           </div>
        </div>
     </section>
      <!-- end why section -->

      <!-- end arrival section -->
      <!-- footer section -->
      <footer class="footer_section">
         <div class="container">

            <div class="footer-info">
                <div class="col-lg-7 mx-auto px-0">
                    <p>
                       &copy; <span id="displayYear"></span> All Rights Reserved
                    </p>
                 </div>
            </div>
            </div>
         </div>
      </footer>
      <!-- footer section -->
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
