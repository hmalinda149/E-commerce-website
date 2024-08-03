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
        h1{
            color: white;
            font-size: 35px!important;

        }
        label{
            display: inline-block;
            width: 250px;
            font-size: 18px!important;
            color: white!important;
        }
        input[type='text']{
            width: 300px;
            height: 50px;
        }
        textarea{
            width: 450px;
            height: 80px;
        }
        .input_deg{
            padding: 15px;
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid green;

        }
        th{
            background-color: rgb(94, 95, 95);
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            color: white;
        }
        td{
            color: white;
            padding: 10px;
            border: 1px solid skyblue;

        }
    </style>

  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">


        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li ><a href="{{url('redirect')}}"> <i class="icon-home"></i>Home </a></li>
                <li class="active"><a href="{{url('view_category')}}"> <i class="icon-grid"></i>Category </a></li>

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

                    <h1>Add Category</h1>

            <div class="div_deg">

                <form action="{{url('/upload_category')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="input_deg">

                        <input type="text" placeholder="Type Category Name" name="category" required>
                        <input type="submit" value="Add Category" class="btn btn-success">
                    </div>

                </form>
            </div>

            <table class="center">

                    <tr>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                @foreach ($data as $data)
                    <tr>
                        <td>
                            {{$data->Category_name}}
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure to delete this ?')" href="{{url('delete_category',$data->id)}}" class="btn btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>

                @endforeach

            </table>


                </div>
            </div>
        </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>
