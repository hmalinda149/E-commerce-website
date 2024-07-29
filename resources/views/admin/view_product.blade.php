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
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;

        }
        .table_deg{
            border: 2px solid greenyellow;
        }
        th{
            background-color: rgb(94, 95, 95);
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }
        td{
            border: 1px solid skyblue;
            text-align: center;
            color: white;
        }
        

        .img_edit{

            height: 100px;
             width: 100px;

        }
        h1{
            color: white;
            font-size: 35px!important;

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

                    @if (session()->has('message'))

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            x
                        </button>
                        {{session()->get('message')}}
                    </div>

                    @endif

                    <h1> Products</h1>

                    <div class="div_deg">
                        <table class="table_deg">
                            <tr>
                                <th>Product Title</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>price</th>
                                <th>Discount price</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>

                            @foreach ($product as $product)

                            <tr>
                                <td>{{$product->title}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->discount_price}}</td>
                                <td>
                                    <img src="/products/{{$product->image}}" alt="" class="img_edit" >
                                </td>
                                <td>
                                    <a href="{{url('update_product',$product->id)}}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <a href="{{url('delete_product',$product->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this ?')">
                                        Delete
                                    </a>
                                </td>

                            </tr>

                            @endforeach





                        </table>

                    </div>

                </div>
            </div>
        </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>
