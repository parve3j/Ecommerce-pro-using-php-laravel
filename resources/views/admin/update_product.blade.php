<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public" >
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
            <h1 style="font-size:40px;" >Update Product</h1>


           <form action="{{url('edit_product', $product->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
           <div class="div_design" >
                <label for="">Product Title</label>
                <input class="text_color" type="text" name="title" value="{{$product->title}}" >
            </div>
            <div class="div_design">
                <label for="">Product Description</label>
                <input class="text_color" type="text" name="description" value="{{$product->description}}" >
            </div>
            <div class="div_design">
                <label for="">Product price</label>
                <input class="text_color" type="number" name="price" value="{{$product->price}}" >
            </div>
            <div class="div_design">
                <label for="">Discount price</label>
                <input class="text_color" type="number" name="discount_price" value="{{$product->discount_price}}" >
            </div>
            <div class="div_design">
                <label for="">Product Quantity</label>
                <input class="text_color" type="number" min="0" name="quantity" value="{{$product->quantity}}" >
            </div>
            <div class="div_design">
                <label for="">Product Category</label>
                <select  class="text_color" name="category" id="">
                    <option value="{{$product->category}}" selected="">Add Category</option>
                    @foreach ($categories as $categorie )
                    <option value="{{ $categorie->category_name }}">{{$categorie->category_name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="div_design">
                <label for="">Old Image</label>
                <img style="margin:auto;" height="50px" width="50px" src="productimage/{{$product->image}}" alt="">
            </div>
            <div class="div_design">
                <label for="">Change Image</label>
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