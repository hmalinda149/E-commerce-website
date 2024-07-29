<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    @include('admin.css')

    <style>
        .title_deg
        {
            font-size: 25px;
            font-weight: bold;
            text-align: center;
            padding-bottom: 40px;
            color: white;
        }
        .table_deg
        {
            border: 3px solid seagreen;
            width: 100%;
            margin: auto;
            text-align: center;

        }
        .th_deg
        {
            background-color: rgb(94, 95, 95);
            color: white;
        }
        .img_size
        {
            width: 100px;
            height: 50px;
        }
        td
        {

            color: white;
            border: 1px solid skyblue;
        }
        th
        {
            border: 3px solid skyblue;
        }
        .p1{
            color: white;
            padding-bottom: 20px;
        }
    </style>

  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                   <h1 class="title_deg">All orders</h1>
                   <div style="padding-left: 600px; padding-bottom:30px">
                    <form action="{{url('search')}}" method="GET" >
                        @csrf
                        <input type="text" name="search" placeholder="Search here">
                        <input type="submit" value="Search" class="btn btn-outline-primary">
                    </form>
                   </div>

                   <table class="table_deg">
                    <tr class="th_deg">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Actions</th>
                        <th>PDF</th>

                    </tr>
                    @forelse ($order as $order)

                    <tr >
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->Product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                            <img class="img_size" src="/products/{{$order->image}}" alt="">


                        </td>
                        <td>
                            @if ($order->delivery_status=='processing')

                            <a class="btn btn-primary" href="{{url('delivered',$order->id)}}" onclick="return confirm('Are you sure the product is  delivered ? ')">Delivered</a>

                            @else

                            <p>Delivered</p>

                            @endif

                        </td>
                        <td>
                            <a href="{{url('print_pdf',$order->id)}}" class="btn btn-success">Print</a>
                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="16">
                            <p class="p1">No Data Found...</p>
                        </td>

                    </tr>

                    @endforelse

                   </table>
                </div>
            </div>
        </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>
