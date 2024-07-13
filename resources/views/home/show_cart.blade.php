<!DOCTYPE html>
<html>
<head>
    <style type="text/css" >
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 30px;
        }
        table, th, td
        {
            border: 1px solid green;
        }

    </style>
@include('home.head')
</head>
   <body>
      <div class="hero_area">
          @include('home.header')
      </div>
      <div>
      <table class="center" >
        <tr>
            <th>Title</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php $total_price = 0  ?>
        @foreach ($carts as $cart )
        <tr>
            <td>{{$cart->product_title}}</td>
            <td>{{$cart->product_quantity}}</td>
            <td>{{$cart->product_price}}</td>
            <td>
                <img height="40" width="40" src="productimage/{{$cart->image}}" alt="">
            </td>
            <td>
                <a class="btn btn-danger" href="{{url('remove_cart', $cart->id)}}">Remove</a>
            </td>
        </tr>
        <?php $total_price+=$cart->product_price ?>
        @endforeach
        
      </table>

      <div>
        <h6 style="text-align: center;" >total_price: {{$total_price}}</h6>
      </div>

      <div class="center">
        <h1 style="font-size: 22px; padding-bottom: 15px;" >Proceed to order</h1>
        <a href="{{url('cash_order')}}" class="btn btn-danger" >Cash on Delivery</a>
        <a href="" class="btn btn-danger" >Pay Using Card</a>
      </div>


      </div>
      @include('home.footer')
      @include('home.script')
   </body>
</html>