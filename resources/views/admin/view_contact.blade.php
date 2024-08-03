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
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">


        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li ><a href="{{url('redirect')}}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{url('view_category')}}"> <i class="icon-grid"></i>Category </a></li>

                <li ><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Product </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                      <li><a href="{{url('add_product')}}">Add Product</a></li>
                      <li ><a href="{{url('view_product')}}">view Product</a></li>

                    </ul>
                  </li>
                  <li ><a href="{{url('order')}}"> <i class="icon-grid"></i>Orders </a></li>
                  <li class="active"><a href="{{url('view_contact')}}"> <i class="icon-grid"></i>Contact </a></li>



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

                    <h1>View Contact</h1>

                    <div class="div_deg">
                        <table class="table_deg">
                            <tr>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>subject</th>
                                <th>Message</th>
                                <th>Delete</th>
                            </tr>


                            @foreach ($contact as $contact)

                            <tr>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->subject}}</td>
                                <td>{{$contact->message}}</td>
                                <td><a href="{{url('delete_contact',$contact->id)}}" class="btn btn-danger">Delete</a></td>
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
