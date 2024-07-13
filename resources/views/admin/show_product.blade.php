<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
    <style type="text/css" >
       
    </style>
</head>
  <body>
    <div class="container-scroller">
     @include('admin.sidebar')
     @include('admin.nav')
       <div class="container-fluid page-body-wrapper">

        <div class="div_center" align="center" style="padding-top: 100px;" >
        <table>
            <tr>
                <th style="padding: 10px;">Title</th>
                <th style="padding: 10px;">Description</th>
                <th style="padding: 10px;">Quantity</th>
                <th style="padding: 10px;">Category</th>
                <th style="padding: 10px;">Price</th>
                <th style="padding: 10px;">Discount Price</th>
                <th style="padding: 10px;">Image</th>
                <th style="padding: 10px;">Update</th>
                <th style="padding: 10px;">Delete</th>
            </tr>
            @foreach ($products as $product)
            <tr align="center">
                   <td style="padding: 10px;">{{$product->title}}</td>
                    <td style="padding: 10px;">{{$product->description}}</td>
                    <td style="padding: 10px;">{{$product->quantity}}</td>
                    <td style="padding: 10px;">{{$product->category}}</td>
                    <td style="padding: 10px;">{{$product->price}}</td>
                    <td style="padding: 10px;">{{$product->discount_price}}</td>
                    <td style="padding: 10px;">
                        <img height="40px", width="40px" src="productimage/{{$product->image}}" alt="">
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Update</a>
                    </td>
                    <td>
                        <a onclick="return confirm('sure?')" class="btn btn-danger" href="{{url('delete_product',$product->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach

        </table>
        </div>
       </div>
    </div>
    @include('admin.script')
  </body>
</html>