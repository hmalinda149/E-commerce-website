<section class="product_section layout_padding">
    <div class="container">



       <div class="heading_container heading_center">

        <div>
            <form action="{{url('search_product')}}" method="GET">
                @csrf
                <input type="text" placeholder="Search Here" name="search" style="width:500px ">
                <input type="submit" value="Search" class="btn btn-outline-primary" >
            </form>
        </div>

        <br><br>

          <h2>
             Our <span>products</span>
          </h2>




       </div>

            @if (session()->has('message'))

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            x
                        </button>
                        {{session()->get('message')}}
                    </div>

            @endif
       <div class="row">

        @foreach ($product as $products)

        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
                <div style="text-align: center">
                    @if ($products->quantity >5)
                        <label for="" class="badge bg-success"><p style="color: white; font-size:25px;">In Stock</p></label>

                    @else
                        <label for="" class="badge bg-danger"><p style="color: white; font-size:25px;">In Stock</p></label>
                    @endif

                </div>
               <div class="option_container">
                  <div class="options">
                     <a href="{{url('product_details',$products->id)}}" class="option1">
                     Product Details
                     </a>
                     <form action="{{url('add_cart',$products->id)}}" method="POST">
                        @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    @if ($products->quantity >5)
                                    <input type="number" name="quantity" value="1" min="1" width="50px;">
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    @if ($products->quantity >5)
                                    <input type="submit" value="Add to cart">
                                    @endif
                                </div>


                            </div>
                     </form>
                  </div>
               </div>
               <div class="img-box">
                  <img src="products/{{$products->image}}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                    {{$products->title}}
                  </h5>

                  @if ($products->discount_price!=null)

                  <h6 style="color: red;">
                    LKR {{$products->discount_price}}
                 </h6>

                 <h6 style="text-decoration: line-through; color:blue;">
                    LKR {{$products->price}}
                 </h6>

                  @else

                  <h6 style="color: blue;">
                     LKR {{$products->price}}
                  </h6>
                  @endif

               </div>
            </div>
         </div>

        @endforeach

        <span style="padding-top: 30px;">
            {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
        </span>



    </div>
 </section>
