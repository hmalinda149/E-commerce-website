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
            font-size: 50px!important;

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

                    <h1>Add Product</h1>

            <div class="div_deg">
                <form action="{{url('upload_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="input_deg">
                        <label for="">Product Title</label>
                        <input type="text" name="title" required placeholder="Enter title">
                    </div>
                    <div class="input_deg">
                        <label for="">Description</label>
                        <textarea name="description" id="" required placeholder="Enter description"></textarea>
                    </div>
                    <div class="input_deg">
                        <label for="">Price</label>
                        <input type="number" name="price" placeholder="Enter price">
                    </div>
                    <div class="input_deg">
                        <label for="">Discount Price</label>
                        <input type="number" name="discount_price" placeholder="Enter discount">
                    </div>
                    <div class="input_deg">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" placeholder="Enter quantity">
                    </div>
                    <div class="input_deg">
                        <label for="">Product Category</label>
                        <select name="category" id="" required>
                            <option value="" selected>Select a Category</option>
                            @foreach ($category as $category)

                            <option value="{{$category->Category_name}}">
                                {{$category->Category_name}}
                            </option>

                            @endforeach


                        </select>
                    </div>
                    <div class="input_deg">
                        <label for="">Product Image</label>
                        <input type="file" name="image" >
                    </div>
                    <div class="input_deg">
                        <input type="submit" value="Add Product" class="btn btn-success">
                    </div>
                </form>
            </div>

                </div>
            </div>
        </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>
