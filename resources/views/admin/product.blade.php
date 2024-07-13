<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
    <style type="text/css" >
       .div_center{
        text-align: center;
        padding-top: 40px;

       }
       .text_color{
        color: black;
       }
       label{
        display: inline-block;
        width: 200px;
       }
       .div_design{
        padding-bottom: 15px;
       }
    </style>
</head>
  <body>
    <div class="container-scroller">
     @include('admin.sidebar')
     @include('admin.nav')
       <div class="container-fluid page-body-wrapper">
        <div class="div_center" >
        @if (session()->has('message'))
            <div class="alert alert-success" >
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>
                {{session()->get('message')}}
            </div>
            @endif
            <h1 style="font-size:40px;" >Add Product</h1>
           <form action="{{url('add_product')}}" method="POST" enctype="multipart/form-data" >
            @csrf
           <div class="div_design" >
                <label for="">Product Title</label>
                <input class="text_color" type="text" name="title" placeholder="Title?" >
            </div>
            <div class="div_design">
                <label for="">Product Description</label>
                <input class="text_color" type="text" name="description" placeholder="Description?" >
            </div>
            <div class="div_design">
                <label for="">Product price</label>
                <input class="text_color" type="number" name="price" placeholder="Price?" >
            </div>
            <div class="div_design">
                <label for="">Discount price</label>
                <input class="text_color" type="number" name="discount_price" placeholder="Discount Price?" >
            </div>
            <div class="div_design">
                <label for="">Product Quantity</label>
                <input class="text_color" type="number" min="0" name="quantity" placeholder="Quantity?" >
            </div>
            <div class="div_design">
                <label for="">Product Category</label>
                <select  class="text_color" name="category" id="">
                    <option value="" selected="">Add Category</option>
                    @foreach ($categories as $categorie )
                    <option value="{{ $categorie->category_name }}">{{$categorie->category_name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="div_design">
                <label for="">Product Image</label>
                <input type="file" name="image" >
            </div>
            <div class="div_design">
                <input type="submit" value="Add Product" class="btn btn-success" >
            </div>
           </form>
            
       </div>

      
    </div>
    @include('admin.script')
  </body>
</html>